<!-- It is good practice to create a subfolder for each controller's views.
Therefore 'Home.php' in the 'app/Controllers' folder has a folder 'Home' in the 'Views' folder.

It is also good practice to match the name of the view file to the name of the method in the controller.
Therefore the 'index()' method in 'Home.php' has a corresponding 'index.php' file in the 'Views/Home' folder.

View partials are view files that contain content that can be reused from view to view.
When using view layouts you must use '$this->include()'
<?php //   <?= $this->include("header") ?>?>

To use a view layout (see app/Views/layouts/default.php) we call the 'extend()' method passing in the path
to the view template.
All content in a view that extends a layout needs to be inside a section.
We enclose content in a section by calling the 'section()' method before it, passing in the name of the section
and the 'endSection()' method after it.
-->

<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Home<?= $this->endSection() ?>

<?= $this->section("content") ?>

    <h1>Welcome</h1>

<?= $this->endSection() ?>