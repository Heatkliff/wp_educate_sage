<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">
  @php wp_head() @endphp
</head>
{!! '<script> window.slide_time = {"autoslide_time":'.get_field("autoslide_time", "option").'}' !!}
{!! 'window.ajax = '.\App\Controllers\App::customHeaderJson().'</script>' !!}
