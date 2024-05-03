function deleteArticle(id) {
	// send request to delete article with specified id
	fetch(`/~77627320/cms/article-delete/${id}`, {
		method: "DELETE",
	})
		.then((response) => {
			if (response.ok) {
				const articleItem = document.getElementById(`article-${id}`);

				if (articleItem) {
					articleItem.remove(); // remove the html article element - <li>
					deleteArticleFromArray(id);
					var newArticleCount = articleObjectArray.length;

					// check for new page adjustment
					if (newArticleCount % maxArticlesPerPage === 0) {
						console.log(
							"No article left to display on current page: Display new page!"
						);
						removePage();
					}
					// re-display the page without the deleted article
					displayPage(currentPage);
				}
			} else {
				console.error(`Error deleting article with ID: ${id}`);
			}
		})
		.catch((error) => {
			console.error("Network error:", error);
		});
}

// remove article <li> element from the array
function deleteArticleFromArray(id) {
	const articleIndex = articleObjectArray.findIndex((article) => {
		return article.id.split("-")[1] === id; // get artile object id
	});

	// check if the article is in the array
	if (articleIndex !== -1) {
		articleObjectArray.splice(articleIndex, 1); // remove article element from array
	}
}

// add delete functionality to article delete button in article row
function enableDeleteFunctionality() {
	for (let i = 0; i < articleObjectArray.length; i++) {
		const article = articleObjectArray[i];
		const id = article.id.split("-")[1]; // get li object id - parse from id attribute

		// find the delete link
		const deleteArticelLink = article.querySelector(".delete-article-link");

		deleteArticelLink.onclick = function (event) {
			event.preventDefault();
			deleteArticle(id);
		};
	}
}
