<?php

require_once 'vendor/autoload.php';

use Intervention\Image\ImageManagerStatic as IImage;

class ImageFlip
{
    protected $origin = 'pew pew in prod.jpg';
    protected $result = 'fliped.jpg';

    public function resize()
    {
        $img = IImage::make($this->origin)
            ->resize(200, null, function ($image) {
                $image->aspectRatio();
            })
            ->rotate(45);

        $img->text(
            'WATERMARK!',
            $img->width() - $img->width() / 5,
            $img->height() - $img->height() / 5,
            function ($font) {
                $font->color(array(255, 0, 0, 0.5));
                $font->align('center');
                $font->valign('center');
            }
        );

        $img->save($this->result, 80);
        echo 'success';
    }
}

$filp = new ImageFlip();
$filp->resize();
