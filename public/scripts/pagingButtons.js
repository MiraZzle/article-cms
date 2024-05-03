const prevPageButton = document.getElementById("previous-button");
const nextPageButton = document.getElementById("next-button");

// initially hide prevPage button
prevPageButton.classList.add("hidden");

// hide nextPage button if there is only one page
if (pageAmount < 2) {
	nextPageButton.classList.add("hidden");
}

prevPageButton.addEventListener("click", (event) => {
	event.preventDefault();

	// check if previous page is the first page
	if (currentPage - 1 == 1) {
		prevPageButton.classList.add("hidden");
	}

	// check if current page is at the last page
	if (currentPage == pageAmount) {
		prevPageButton.classList.remove("hidden");
	}

	if (currentPage - 1 > 0) {
		--currentPage;
	}
	displayPage(currentPage);
});

nextPageButton.addEventListener("click", (event) => {
	event.preventDefault();

	// check if next page is at the last page
	if (currentPage + 1 == pageAmount) {
		nextPageButton.classList.add("hidden");
	}
	if (currentPage == 1) {
		nextPageButton.classList.remove("hidden");
	}
	if (currentPage + 1 <= pageAmount) {
		++currentPage;
	}
	displayPage(currentPage);
});
