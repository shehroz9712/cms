<?php

/**
 * AssetHelper
 *
 */


/**
 * Return's admin assets directory
 *
 * CALLING PROCEDURE
 *
 * In controller call it like this:
 * $adminAssetsDirectory = adminAssetsDir() . $site_settings->site_logo;
 *
 * In View call it like this:
 * {{ asset(adminAssetsDir() . $site_settings->site_logo) }}
 *
 * @param $folder
 * @return bool
 */
function uploadsDir($folder = '')
{
    return 'uploads/' . $folder;
}

function uploadsUrl($folder, $file = '')
{
    return $file != '' && file_exists('uploads/' . $folder . '/' . $file) ? url('uploads') . '/' . $folder . '/' . $file : '';
}

function adminHasAssets($image)
{
    if (!empty($image) && file_exists(uploadsDir() . $image)) {
        return true;
    } else {
        return false;
    }
}

function defaultUserImage()
{
    return 'assets/admin/img/avatar.png';
}

function defaultStoreCoverUrl()
{
    return 'assets/front/images/store-cover.png';
}

///////////////////////////////////////////////////////

/**
 * Used to generate URL of the CSS file for front end
 */
function frontCss($file = '')
{
    return asset('assets/front/css/' . $file);
}
function frontVendors($file = '')
{
    return asset('assets/front/vendors/' . $file);
}

/**
 * Used to generate URL of the fonts file for front end
 */
function frontFont($file = '')
{
    return asset('assets/front/' . $file);
}

/**
 * Used to generate URL of the image file for front end
 */
function frontImage($file = '')
{
    return asset('assets/front/image/' . $file);
}


function frontJs($file = '')
{
    return asset('assets/front/js/' . $file);
}

function adminVendors($file = '')
{

    return asset('assets/admin/vendors/' . $file);
}

function adminImage($file = '')
{
    return asset('assets/admin/images/' . $file);
}



function adminJs($file = '')
{
    return asset('assets/admin/js/' . $file);
}
function adminCss($file = '')
{
    return asset('assets/admin/css/' . $file);
}



function image_upload($file, $path)
{
    if ($file != null && $file->isValid()) {
        $extension = $file->getClientOriginalExtension();
        $filename = 'file-' . time() . '.' . $extension;
        $file->move('assets/front/image/' . $path, $filename);
        return $filename;
    } else {
        return 'no-image.jpg';
    }
    
}
