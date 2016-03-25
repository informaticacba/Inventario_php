<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>INCES</title>

<link href="../css/menu.css" rel="stylesheet" type="text/css" />
<link href="../css/form.css" rel="stylesheet" type="text/css" />
<!-- scritp para el calendario -->
<link href="../calendario/calendar-blue.css" rel="stylesheet" type="text/css">
<script type="text/JavaScript" language="javascript" src="../calendario/calendar.js"></script>
<script type="text/JavaScript" language="javascript" src="../calendario/lang/calendar-sp.js"></script>
<script type="text/JavaScript" language="javascript" src="../calendario/calendar-setup.js"></script>
</head>

<body>

<div class="calendar">

<input id="calendar-inputField" /><button id="calendar-trigger">...</button>
<script>
    Calendar.setup({
        trigger    : "calendar-trigger",
        inputField : "calendar-inputField"
    });

</script>
</div>

<div class="calendar">
<input id="calendar-inputField2" /><button id="calendar-trigger">...</button>
<script>
    Calendar.setup({
        trigger    : "calendar-trigger",
        inputField : "calendar-inputField"
    });

</script>
</div>

</body>
</html>