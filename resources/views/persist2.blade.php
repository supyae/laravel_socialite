<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Persist checkboxes</title>
</head>

<body>
<div>
    <label for="checkAll">Check all</label>
    <input type="checkbox" id="checkAll">
</div>
<div>
    <label for="option1">Option 1</label>
    <input type="checkbox" id="option1">
</div>
<div>
    <label for="option2">Option 2</label>
    <input type="checkbox" id="option2">
</div>
<div>
    <label for="option3">Option 3</label>
    <input type="checkbox" id="option3">
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://cdn.jsdelivr.net/jquery.cookie/1.4.0/jquery.cookie.min.js"></script>

<script>
    $("#checkAll").on("change", function() {
        $(':checkbox').not(this).prop('checked', this.checked);
    });

    $(":checkbox").on("change", function(){
        var checkboxValues = {};
        $(":checkbox").each(function(){
            checkboxValues[this.id] = this.checked;
        });
        $.cookie('checkboxValues', checkboxValues, { expires: 7, path: '/' })
    });

    function repopulateCheckboxes(){
        var checkboxValues = $.cookie('checkboxValues');
        if(checkboxValues){
            Object.keys(checkboxValues).forEach(function(element) {
                var checked = checkboxValues[element];
                $("#" + element).prop('checked', checked);
            });
        }
    }

    $.cookie.json = true;
    repopulateCheckboxes();
</script>
</body>
</html>