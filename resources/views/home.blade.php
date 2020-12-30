<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Laravel Placeholder Images</title>
	<link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <h1>Laravel Placeholder Images</h1>
    <p>This server can be used for serving placeholder
    images for any web page.</p>
    <p>To request a placeholder image of a given width and height
    simply include an image with the source pointing to
    <b>/image/&lt;width&gt;x&lt;height&gt;/</b>
    on this server such as:</p>
    <pre>
        &lt;img src="{{ $example }}" &gt;
    </pre>
    <h2>Examples</h2>
    <ul>
        <li><img src="{{{ route('placeholder', ['width' => 50, 'height' => 50]) }}}"></li>
        <li><img src="{{{ route('placeholder', ['width' => 100, 'height' => 50]) }}}"></li>
        <li><img src="{{{ route('placeholder', ['width' => 50, 'height' => 100]) }}}"></li>
    </ul>
</body>
</html>

