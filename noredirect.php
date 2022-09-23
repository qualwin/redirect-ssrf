
<?php 

function stripFile($in)
{
    $pieces = explode("/", $in);
    if (count($pieces) < 4) return $in . "/";
    if (strpos(end($pieces) , ".") !== false)
    {
        array_pop($pieces);
    }
    elseif (end($pieces) !== "")
    {
        $pieces[] = "";
    }
    return implode("/", $pieces) . "/";
}
function url_get_contents($url)
{
    if (function_exists('curl_exec'))
    {
        $conn = curl_init($url);
        curl_setopt($conn, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($conn, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($conn, CURLOPT_RETURNTRANSFER, 1);
        $url_get_contents_data = (curl_exec($conn));
        curl_close($conn);
    }
    elseif (function_exists('file_get_contents'))
    {
        $url_get_contents_data = file_get_contents($url);
    }
    elseif (function_exists('fopen') && function_exists('stream_get_contents'))
    {
        $handle = fopen($url, "r");
        $url_get_contents_data = stream_get_contents($handle);
    }
    else
    {
        $url_get_contents_data = false;
    }
    $data = str_replace('<a href="', '<a href="' . 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER["PHP_SELF"] . '?url=' . stripFile($url) , $url_get_contents_data);
    $data = str_replace('<head>', '<head><base href="' . stripFile($url) . '">', $data);
    return $data;
}
if (!isset($_GET['url']))
{ ?><?php
}
else
{
    if (substr($_GET['url'], 0, 4) == 'http')
    {
        
        echo url_get_contents(htmlspecialchars($_GET['url']));
    }
    else
    { ?> <?php
        echo "Üzgünüm dostum, sana güzel haberlerle gelemedim.</center>";
    }
}
?>