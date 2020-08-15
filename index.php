<?php

// исходный файл картинки
$filename = 'img/image1.jpg';

// получение ширины, высоты и типа картинки
$info   = getimagesize($filename);
$width  = $info[0];
$height = $info[1];
$type   = $info[2];

// создание исходной картинки
$img = imageCreateFromJpeg($filename);

// Размеры новой картинки.
$w = 200;
$h = 100;

// создание новой картинки заданных размеров
$tmp = imageCreateTrueColor($w, $h);

// пропорциональная высота относительно исходной
$th = ceil($w / ($width / $height));
// echo $th; die; 

// копирование исходной прямоугольника из исходной картинки в новую
// при этом сохранены пропорции, а обрезка произошла сверху и снизу
imageCopyResampled($tmp, $img, 0, ceil(($h - $th) / 2), 0, 0, $w, $th, $width, $height);
$img = $tmp;

// сохранение новой картинки в новый файл
$newFilename = 'img/banner.jpg';
imageJpeg($img, $newFilename);
?>


<!-- Вывод уменьшенной картинки  -->
<div class="banner">
    <img src="<?= $newFilename ?>" alt="баннер">
</div>