<?php
require_once 'Control.php';
require_once 'Input.php';
require_once 'Button.php';
require_once 'Text.php';
require_once 'Label.php';
function convertToHTML($control)
{
    $style = "style='background: " . $control->getBackground() . "; width: " . $control->getWidth() . "; height: " . $control->getHeight() . ";'";

    if ($control instanceof Button)
    {
        return "<button name='" . $control->getName() . "' value='" . $control->getValue() . "' " . $style . ">" .
            ($control->getSubmitState() ? "Submit" : "Button") . "</button>";
    }

    if ($control instanceof Text)
    {
        return "<input type='text' name='" . $control->getName() . "' value='" . $control->getValue() . "' placeholder='" . $control->getPlaceholder() . "' " . $style . ">";
    }

    if ($control instanceof Label)
    {
        return "<label for='" . $control->getParentName() . "' " . $style . ">Label</label>";
    }

    return '';
}

$button = new Button("Red", "100px", "50px", "submitBtn", "Send", true);

$text = new Text("#f5f5f5", "200px", "40px", "username", "", "Text");

$label = new Label("#fff", "100px", "20px", $text);

echo convertToHTML($button);
echo convertToHTML($text);
echo convertToHTML($label);

?>
