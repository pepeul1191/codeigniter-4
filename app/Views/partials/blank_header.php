<!DOCTYPE html>
<html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <link rel="shortcut icon" href="<?php echo $constants->{'staticURL'}; ?>favicon.ico">
  <?php if($session != false){ ?><meta name="csrf" key="<?php echo $session->get('csrfKey'); ?>" value="<?php echo $session->get('csrfValue'); ?>"><?php } ?>
  <meta name="description" content="Sitio Web con SvelteJS">
  <meta name="author" content="Software Web Perú">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?php echo($title); ?></title>
  <base href="<?php echo($href); ?>">
  <?php echo loadStylesheets($stylesheets); ?>
  <script type="text/javascript">
    const BASE_URL = "<?php echo $constants->{'baseURL'};?>";
    const STATIC_URL = "<?php echo $constants->{'staticURL'};?>";
  </script>
</head>
<body>