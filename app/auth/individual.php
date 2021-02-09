<?php
echo 'welcome to individual page'
?>
<html>
<head>
<!-- <link type="text/css" rel="stylesheet" href="../../css\style.css">    -->


</head>
<style>   
    .login-panel {   
        margin-top: 150px;   }
        .content {
  display: none;
}
input:checked + span,
input:checked + input {
  display: block;
}
   
</style>
<body>

<form id='group'>
  <div>
    <label>
      <input type="radio" name="group1" class="trigger"  checked />ABC
      <span class="abc content">
        <span>I belong to ABC</span>
      <input type="button" value="ABC" />
      </span>
    </label>
  </div>
  <br>
  <div>
    <label>
      <input type="radio" name="group1" class="trigger"  />XYZ
      <span class="xyz content">
        <span>I belong to XYZ</span>
      <input type="button" value="XYZ" />
      </span>
    </label>
  </div>
</form>
</body>
</html>