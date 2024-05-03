const saveButton = document.getElementById("save-button");
const nameInput = document.getElementById("article-name");

// prevent saving article with empty name
nameInput.addEventListener("input", () => {
	if (nameInput.value == "") {
		saveButton.disabled = true;
	} else {
		saveButton.disabled = false;
	}
});
