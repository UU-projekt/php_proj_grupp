<?php include "./include/bootstrap.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload image</title>
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/uploadImage.css">
</head>
<body>

    <?php if(isset($_GET["url"])): ?>
        <img src="<?= $_GET["url"] ?>" />
    <?php else: ?>
    <div onclick="handleClick()" id="upload">
        <?php include "./include/views/_info-box.php" ?>
        <?= getIconElement("upload") ?>
    </div>
    <form onchange="beforeSubmit()" method="POST" action="/api/upload_image.php" enctype="multipart/form-data">
        <input accept="image/png, image/jpeg" type="file" name="image_file" />
        <input type="hidden" name="image" id="image" />
    </form>
    <?php endif; ?>
</body>
    <script>

        <?php if(isset($_GET["url"])): ?>
            const i = "<?= $_GET["url"] ?>"

            if(window.parent.window.onImgUpload) {
                window.parent.window.onImgUpload(i)
            }
        <?php endif; ?>

        const getScrElement = () => {
            const tag = document.createElement("script")
            tag.src = "/js/toast.js"
            return tag
        }

        const getStyleElement = () => {
            const tag = document.createElement("link")
            tag.rel = "stylesheet"
            tag.href = "/css/toast/index.css"
            return tag
        }

        const inject = () => {
            window.parent.document.body.append(getScrElement())
            window.parent.document.head.append(getStyleElement())
        }
        
        inject()

        function getFileElem() {
            return document.querySelector("input[name='image_file']")
        }

        function handleClick() {
            const e = document.querySelector("input[name='image_file']")
            e.click()
        }

        function imageAsBase64(img) {
            return new Promise((resolve, reject) => {
                const reader = new FileReader()
                
                reader.onloadend = () => {
                    resolve(reader.result)
                }

                reader.readAsDataURL(img)
            })
        }

        async function beforeSubmit() {
            
            const f = document.querySelector("input[name='image_file']")
            const form = document.querySelector("form")

            if(!f.files || !f.files[0]) {

            }

            const file = f.files[0]
            const fileSize = (file.size / 1_000_000).toFixed(1)

            window.parent.window.toast("Din bild", `den är ${fileSize}mb`)

            if(file.size > 32_000_000) {
                window.parent.window.toast("För stor bild.", `Bilden får inte överstiga 32mb (${fileSize - 32}mb för stor)`)
                f.files = []
                return
            }

            form.submit()
        }
    </script>
</html>