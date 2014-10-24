<?php
namespace Pria\FileBundle\Controller;

class ThumbnailController
{
    /** Source Image */
    private $_srcImage;

    /** Source Dimensions */
    private $_srcImageX;
    private $_srcImageY;

    /** Destination Image */
    private $_dstImage;

    /** Destination Dimensions */
    private $_dstImageX;
    private $_dstImageY;

    private $_filename;
    private $_prefix;

    /** @var <boolean> $Result Whether or not the file was created */
    public $result = NULL;
    public $error;

    /**
     * @desc Setup the name of the file to handle
     *
     * @param string $path
     * @param string $filename
     * @param string $prefix
     * @param int $quality
     * @internal param $ <string> $filename The path and name of the file, ie: ../files/image.jpg
     */
    public function __construct($path, $filename, $prefix='', $quality = 80) {
        $this->_filename = $filename;
        $this->_prefix = $prefix;
        $this->originalFileLocation = $path.$filename;

        /** Make sure the file exists so we don't waste time */
        if (!file_exists($this->originalFileLocation)) {
            $this->error = "Make sure the file exists.";
            $this->result = false;
            return $this->result;
        }

        /** Setup the reset */
        $format = pathinfo($this->originalFileLocation);
        $this->thumbFileName = $format['dirname'].'/'.$prefix.$format['filename'].'.'.$format['extension'];
        $this->quality = $quality;

        /** Grab the Source Dimensions */
        switch ($format['extension']) {
            case 'jpg':
            case 'jpeg':
                $this->imageFormat = 'JPEG';
                $this->_srcImage = imageCreateFromJPEG($this->originalFileLocation);
                break;
            case 'png':
                $this->imageFormat = 'PNG';
                $this->_srcImage = imageCreateFromPNG($this->originalFileLocation);
                imageAlphaBlending($this->_srcImage, false); // setting alpha blending on
                imageSaveAlpha($this->_srcImage, true); // save alphablending setting (important)
                break;
            case 'gif':
                $this->imageFormat = 'GIF';
                $this->_srcImage = imageCreateFromGIF($this->originalFileLocation);
                break;
        }
        $this->_srcImageX = imagesX($this->_srcImage);
        $this->_srcImageY = imagesY($this->_srcImage);
    }

    /**
     * @desc Set the thumbnail size,
     *  Depending on the proportion of the image factor this in:
     *  if the image is wider than the height, the X will match.
     *  if the image is taller than the width, the Y will match.
     *
     * @param $x
     * @param $y
     * @param bool $clipping
     * @internal param $ <int> $x Desired width
     * @internal param $ <int> $y Desired height
     * @param <bln> $clipping Clip the image to force the exact size? (Otherwise it's relative)
     */
    public function setSize($x, $y, $clipping = false) {
        $this->_dstImageX = (int) $x;
        $this->_dstImageY = (int) $y;

        /**
         *	When a upload is way too tall or way too high, it doesn't resize properly,
         *	so we usually want to enable clipping, it's off by default
         */
        if ($clipping == false) {
            /** Thanks to my brother Joe for helping me with math, I'm really bad! */
            if ($this->_srcImageX > $this->_srcImageY) {
                $this->_dstImageX = ($this->_srcImageX * $this->_dstImageY) / $this->_srcImageY;
            }

            if ($this->_srcImageX < $this->_srcImageY) {
                $this->_dstImageY = ($this->_srcImageY * $this->_dstImageX) / $this->_srcImageX;
            }
        }
    }

    /**
     * @desc This moves the file to a location -- It must be set BEFORE save() is run!
     * @param <string> $Dir The directory to move the new thumbnail to
     */
    public function moveTo($dir) {
        if (strpos($dir, -1) != '/')
        {
            // Append a forward slash if its missing to keep the link safe
            $dir .= '/';
        }

        $this->moveTo = $dir;
    }

    /**
     * @desc Runs the operation and outputs the image
     */
    public function save() {
        /** Make sure the thumbnail sizes are set */
        if (!isset($this->_dstImageX) || !isset($this->_dstImageY))
            $this->error = "Please set the size of your thumbnail using the setSize() method.";

        /** Do not process the image if an error exists */
        if (!empty($this->error))
            return false;

        /** Create a new blank image */
        $this->_dstImage = imageCreateTrueColor($this->_dstImageX, $this->_dstImageY);

        /** Copy the resampled image onto the blank */
        imageCopyResampled($this->_dstImage, $this->_srcImage, 0, 0, 0, 0, $this->_dstImageX, $this->_dstImageY, $this->_srcImageX, $this->_srcImageY);

        /** Save the file, also allow the result to be grabbed from a var */

        switch ($this->imageFormat) {
            case 'JPEG':
                $this->result = imageJPEG($this->_dstImage, $this->thumbFileName, $this->quality);
                break;
            case 'PNG':
                $this->result = imagePNG($this->_dstImage, $this->thumbFileName, 0, NULL);
                break;
            case 'GIF':
                $this->result = imageGIF($this->_dstImage, $this->thumbFileName, $this->quality);
                break;
        }

        /** If we need to move the location */
        if (isset($this->moveTo)) {
            $wasMoved = rename($this->thumbFileName, $this->moveTo . $this->thumbFileName);

            /** If moving it fails, delete the thumbnail */
            if ($wasMoved == false) {
                $this->error = "The thumbnail was created, but it could not be moved because
				your folder: {$this->moveTo} is not writable, so the thumbnail was erased
				so you can give your directory CHMOD 0777 permission.";

                @unlink($this->thumbFileName);
            }
        }

        /** Finishing by removing from memory */
        @imageDestroy($this->_srcImage);
        @imageDestroy($this->_dstImage);
    }

    public function getThumbFileName(){
        return $this->_prefix.$this->_filename;
    }
}