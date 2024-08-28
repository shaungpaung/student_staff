const quoteContent = document.getElementById("quote-content");
const quoteAuthor = document.getElementById("quote-author");
const nextButton = document.getElementById("next-button");
const previousButton = document.getElementById("previous-button");
//get the day
const today = new Date();
const startOfYear = new Date(today.getFullYear(), 0, 0);
const diff = today - startOfYear;
// Convert milliseconds to days
const oneDay = 1000 * 60 * 60 * 24; // Milliseconds in one day
const dayOfYear = Math.floor(diff / oneDay);
//fetch the quotes
const quotes = () => {
  return $.ajax({
    url: "../../student_staff/quotes.json",
    method: "GET",
    dataType: "json",
  })
    .then((data) => {
      return data;
    })
    .fail((jqXHR, textStatus, errorThrown) => {
      console.error("Error fetching the JSON data: ", textStatus, errorThrown);
    });
};
//store the fetched data
const fetchedQuoteContents = [];
let quoteIndexToDisplay;
let theQuote;
let authorOfTheQuote;
quotes().then((data) => {
  fetchedQuoteContents.push(...data.quotes);
  const totalQuotes = data.quotes.length;
  //find the quote by the day (algorithm)
  quoteIndexToDisplay = dayOfYear % totalQuotes;
  authorOfTheQuote = data.quotes[quoteIndexToDisplay].author;
  theQuote = data.quotes[quoteIndexToDisplay].quote;
  let nextButonClickCounts = 0;
  let previousButtonClickCounts = 0;
  //next and back button of the quote
  nextButton.addEventListener("click", () => {
    nextButonClickCounts++;
    if (quoteIndexToDisplay + nextButonClickCounts < totalQuotes) {
      authorOfTheQuote =
        data.quotes[quoteIndexToDisplay + nextButonClickCounts].author;
      theQuote = data.quotes[quoteIndexToDisplay + nextButonClickCounts].quote;
      quoteContent.textContent = theQuote;
      quoteAuthor.textContent = authorOfTheQuote;
    }
  });
  nextButton.addEventListener("keydown", (event) => {
    if (event.key === "ArrowRight") {
      nextButonClickCounts++;
      if (quoteIndexToDisplay + nextButonClickCounts < totalQuotes) {
        authorOfTheQuote =
          data.quotes[quoteIndexToDisplay + nextButonClickCounts].author;
        theQuote =
          data.quotes[quoteIndexToDisplay + nextButonClickCounts].quote;
        quoteContent.textContent = theQuote;
        quoteAuthor.textContent = authorOfTheQuote;
      }
    }
  });
  previousButton.addEventListener("click", () => {
    previousButtonClickCounts++;
    if (quoteIndexToDisplay - previousButtonClickCounts >= 0) {
      authorOfTheQuote =
        data.quotes[quoteIndexToDisplay - previousButtonClickCounts].author;
      theQuote =
        data.quotes[quoteIndexToDisplay - previousButtonClickCounts].quote;
      quoteContent.textContent = theQuote;
      quoteAuthor.textContent = authorOfTheQuote;
    }
  });
  previousButton.addEventListener("keydown", (event) => {
    if (event.key === "ArrowLeft") {
      previousButtonClickCounts++;
      if (quoteIndexToDisplay - previousButtonClickCounts >= 0) {
        authorOfTheQuote =
          data.quotes[quoteIndexToDisplay - previousButtonClickCounts].author;
        theQuote =
          data.quotes[quoteIndexToDisplay - previousButtonClickCounts].quote;
        quoteContent.textContent = theQuote;
        quoteAuthor.textContent = authorOfTheQuote;
      }
    }
  });

  quoteContent.textContent = theQuote;
  quoteAuthor.textContent = authorOfTheQuote;
});

//search input implementation
const searchInput = document.getElementById("search-input");

searchInput.addEventListener("input", (event) => {
  const searchTerm = event.target.value.toLowerCase();

  fetchedQuoteContents.forEach((q) => {
    if (
      q.quote.toLowerCase().includes(searchTerm) ||
      q.author.toLowerCase().includes(searchTerm)
    ) {
      quoteIndexToDisplay = fetchedQuoteContents.indexOf(q);
      authorOfTheQuote = q.author;
      theQuote = q.quote;
      quoteContent.textContent = theQuote;
      quoteAuthor.textContent = authorOfTheQuote;
    }
  });
});
