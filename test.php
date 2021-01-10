<!DOCTYPE html>
<html>
<head>

</head>
<body>
<form name="refreshForm" id="form" action="form.php">
<input type="text" name="visited" value="" />
<input type="text" value="hello" />
<input type="submit" />
</form>

<script>
window.onbeforeunload = closingCode;
function closingCode(){
   document.getElementById("form").submit();
   return null;
}
</script>
</body>
</html>
