//field function to get/set input values of any type of input
(function () {
    $.fn.field = function (inputName, value)
    {
        console.log('field called...');
        console.log($(this));
        console.log(typeof inputName);
 
        if (typeof inputName !== "string") return false;
        var $inputElement = $(this).find("[name=" + inputName + "]");
        // var $inputElement = $(this); //direct mapping with no form context
 
        console.log($inputElement);
 
        if (typeof value === "undefined" && $inputElement.length >= 1)
        {
            switch ($inputElement.attr("type"))
            {
                case "checkbox":
                    return $inputElement.is(":checked");
                    break;
                case "radio":
                    var result;
                    $inputElement.each(function (i, val) {
                        if ($(this).is(":checked")) result = $(this).val()
                    });
                    return result;
                    break;
                default:
                    return $inputElement.val();
                    break;
            }
        }
        else
        {
            switch ($inputElement.attr("type"))
            {
                case "checkbox":
                    $inputElement.attr({
                        checked: value
                    });
                    break;
                case "radio":
                    $inputElement.each(function (i) {
                        if ($(this).val() == value) $(this).attr({
                            checked: true
                        })
                    });
                    break;
                case undefined:
                    $(this).append('<input type="hidden" name="' + inputName + '" value="' + value + '" />');
                    break;
                default:
                    $inputElement.val(value);
                    break;
            }
            return $inputElement;
        }
    }
})();