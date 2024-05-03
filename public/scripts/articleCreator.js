// container for create article popup card
const createArticleContainer = document.getElementById(
	"create-article-container"
);

const createArticleButton = document.getElementById("create-article-button");
const backButton = document.getElementById("back-button");
const createButton = document.getElementById("create");

const articleNameInput = document.getElementById("article-name");

// show create popup on createArticle button click
createArticleButton.addEventListener("click", (event) => {
	event.preventDefault();
	createArticleContainer.classList.remove("hidden");
});

// hide create popup on back button click
backButton.addEventListener("click", (event) => {
	event.preventDefault();
	createArticleContainer.classList.add("hidden");
});

// disable create button by default - name input is empty by default
createButton.disabled = true;

// disable / enable createButton if name is empty / filled
articleNameInput.addEventListener("input", () => {
	if (articleNameInput.value == "") {
		createButton.disabled = true;
	} else {
		createButton.disabled = false;
	}
});
