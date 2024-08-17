const quoteContent = document.getElementById("quote-content");
const quoteAuthor = document.getElementById("quote-author");
const nextButton = document.getElementById("next-button");
const previousButton = document.getElementById("previous-button");
//get the day
const today = new Date();
const startOfYear = new Date(today.getFullYear(), 0, 0);
const diff = today - startOfYear;
const oneDay = 1000 * 60 * 60 * 24; 
const dayOfYear = Math.floor(diff / oneDay);
const quotes = async () => {
  try {
    const response = await fetch("../../student_staff/quotes.json");
    if (!response.ok) {
      throw new Error("Network response was not ok " + response.statusText);
    }
    const quotesData = await response.json();
    return quotesData;
  } catch (error) {
    console.error("Error fetching the JSON data: ", error);
  }
};
quotes().then((data) => {
  const totalQuotes = data.quotes.length;
  const quoteIndexToDisplay = dayOfYear % totalQuotes;
  let authorOfTheQuote = data.quotes[quoteIndexToDisplay].author;
  let theQuote = data.quotes[quoteIndexToDisplay].quote;
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
  quoteContent.textContent = theQuote;
  quoteAuthor.textContent = authorOfTheQuote;
});
