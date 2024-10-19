function validateFileInput(
    inputSelector,
    errorSelector,
    allowedExtensions,
    maxSize
) {
    $(inputSelector).change(function () {
        const file = this.files[0];
        const errorMessage = $(errorSelector);

        errorMessage.text("");

        if (file) {
            if (!allowedExtensions.exec(file.name)) {
                const formattedExtensions = allowedExtensions.source
                    .replace(/[\\^$()]/g, "")
                    .split("|")
                    .map((ext) => ext.toUpperCase())
                    .join(", ");

                errorMessage.text(
                    "Format file tidak didukung. Hanya (" +
                        formattedExtensions +
                        ") yang diizinkan."
                );
                $(this).val("");
                return;
                $(this).val("");
                return;
            }

            if (file.size > maxSize) {
                errorMessage.text(
                    "Ukuran file terlalu besar. Maksimal " +
                        maxSize / 1024 / 1024 +
                        "MB."
                );
                $(this).val("");
                return;
            }

            showImagePreview(inputSelector, "#imagePreview");
        }
    });
}

function showImagePreview(inputSelector, previewSelector) {
    const file = $(inputSelector)[0].files[0];
    const reader = new FileReader();

    reader.onload = function (e) {
        $(previewSelector).removeClass("d-none");
        $(previewSelector).attr("src", e.target.result).show();
    };

    if (file) {
        reader.readAsDataURL(file);
    } else {
        $(previewSelector).hide();
    }
}
