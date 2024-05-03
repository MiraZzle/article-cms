const maxArticlesPerPage = 10;
const articleItemList = document.getElementById("article-item-list"); // <ul> of article
const articleObjectArray = Array.from(articleItemList.children); // array containing inidividual article <li> elements

let articleAmount = articleObjectArray.length;
let currentPage = 1;
let pageAmount = Math.ceil(articleAmount / maxArticlesPerPage);

// display initial page
displayPage(currentPage);
enableDeleteFunctionality();

function displayPage(pageIndex) {
	updateStats();
	console.log("Displaying page: " + currentPage);

	// calculate start and end index of articles on current page
	const startIndex = (pageIndex - 1) * maxArticlesPerPage;
	const endIndex = startIndex + maxArticlesPerPage;

	// extract articles to show
	const shownArticles = articleObjectArray.slice(startIndex, endIndex);

	// adjust for deleted pages
	if (currentPage !== 1 && shownArticles.length === 0) {
		currentPage = currentPage - 1;
		displayPage(currentPage);
	}

	const previousButton = document.getElementById("previous-button");
	const nextButton = document.getElementById("next-button");

	// adjust next button visibility
	if (currentPage >= pageAmount) {
		nextButton.classList.add("hidden");
	} else {
		nextButton.classList.remove("hidden");
	}

	// adjust previous button visibility
	if (currentPage < 2) {
		previousButton.classList.add("hidden");
	} else {
		previousButton.classList.remove("hidden");
	}

	// clear existing article list - remove all child elements of <ul>
	while (articleItemList.firstChild) {
		articleItemList.removeChild(articleItemList.firstChild);
	}

	// append shown article <li> elements
	shownArticles.forEach((article) => {
		articleItemList.appendChild(article);
	});

	displayPageAmount();
}

function displayPageAmount() {
	const pageCountDisplay = document.getElementById("page-count-display");
	pageCountDisplay.innerText = `Page count ${pageAmount}`;
}

function removePage() {
	--pageAmount;
	currentPage = pageAmount;
}

function updateStats() {
	articleAmount = articleObjectArray.length;
	pageAmount = Math.ceil(articleAmount / maxArticlesPerPage);
}