<!-- To make this into a template we add one or more sections.
To display a section we call the 'renderSection()' method passing in the name of the section.
-->


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title> <?= $this->renderSection("title") ?> </title>
</head>
<body>

    <?= $this->renderSection("content") ?>

</body>
</html>