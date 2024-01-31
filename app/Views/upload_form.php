<!-- app/Views/upload_form.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Upload Form</title>
</head>
<body>

    <h2>Photo Upload Form</h2>

    <?php if (session()->has('success')): ?>
        <p><?= session('success') ?></p>
    <?php endif; ?>

    <?php echo form_open_multipart('/uploadForm'); ?>

        <label for="judul">Title:</label>
        <input type="text" name="judul" value="<?= old('judul') ?>" required>
        <br>

        <label for="deskripsi">Description:</label>
        <textarea name="deskripsi" required><?= old('deskripsi') ?></textarea>
        <br>

        <label for="lokasifile">Choose Photo:</label>
        <input type="file" name="lokasifile" accept="image/*" required>
        <br>

        <button type="submit">Upload</button>

    <?php echo form_close(); ?>

    <?php if (isset($validation)): ?>
        <?= $validation->listErrors() ?>
    <?php endif; ?>

</body>
</html>
