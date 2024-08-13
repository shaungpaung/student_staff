// Happy Card
const happyCardContainer = document.getElementById("happy");
const initialHappyTitle = document.getElementsByClassName("happy-content")[0];
const happyGiveScoreBtn = document.getElementById("happy-give-score-button");

let selectedHappyScore;
happyGiveScoreBtn.addEventListener("click", () => {
  if (initialHappyTitle) {
    happyCardContainer.innerHTML = `
      <div class="give-score-happy-content">
        <p class="happy-score" id="score1">1</p>
        <p class="happy-score" id="score2">2</p>
        <p class="happy-score" id="score3">3</p>
        <p class="happy-score" id="score4">4</p>
        <p class="happy-score" id="score5">5</p>
      </div>
      <p id="happy-condition"></p>
      <button type="submit" name="submit"
        id="confirm-give-score"
        style="margin: 20px; border: 1px solid rgb(61, 60, 60); padding: 10px; background: transparent; box-shadow: 5px 5px black; cursor: pointer;">
        Confirm score
      </button>`;

    let happyCondition = document.getElementById("happy-condition");
    let happyScores = document.getElementsByClassName("happy-score");

    for (let i = 0; i < happyScores.length; i++) {
      happyScores[i].addEventListener("click", function () {
        selectedHappyScore = this.textContent;
        switch (selectedHappyScore) {
          case "1":
            happyCondition.textContent = "I am sad";
            break;
          case "2":
            happyCondition.textContent = "I am not really happy";
            break;
          case "3":
            happyCondition.textContent = "I am neither sad nor happy";
            break;
          case "4":
            happyCondition.textContent = "I am in a good mood";
            break;
          case "5":
            happyCondition.textContent = "I am very happy <3";
            break;
        }
      });
    }

    // Confirm Score Click Event
    document
      .getElementById("confirm-give-score")
      .addEventListener("click", function () {
        updateWellbeingScore("happiness", selectedHappyScore);
      });
  }
});

// Workload Card
const workloadCardContainer = document.getElementById("workload");
const initialWorkloadTitle =
  document.getElementsByClassName("workload-content")[0];
const workloadGiveScoreBtn = document.getElementById(
  "workload-give-score-button"
);

let selectedWorkloadScore;
workloadGiveScoreBtn.addEventListener("click", () => {
  if (initialWorkloadTitle) {
    workloadCardContainer.innerHTML = `
      <div class="give-score-workload-content">
        <p class="workload-score" id="score1">1</p>
        <p class="workload-score" id="score2">2</p>
        <p class="workload-score" id="score3">3</p>
        <p class="workload-score" id="score4">4</p>
        <p class="workload-score" id="score5">5</p>
      </div>
      <p id="workload-condition"></p>
      <button type="submit" name="submit"
        id="workload-confirm-give-score"
        style="margin: 20px; border: 1px solid rgb(61, 60, 60); padding: 10px; background: transparent; box-shadow: 5px 5px black; cursor: pointer;">
        Confirm score
      </button>`;

    let workloadCondition = document.getElementById("workload-condition");
    let workloadScores = document.getElementsByClassName("workload-score");

    for (let i = 0; i < workloadScores.length; i++) {
      workloadScores[i].addEventListener("click", function () {
        selectedWorkloadScore = this.textContent;
        switch (selectedWorkloadScore) {
          case "1":
            workloadCondition.textContent = "Bad";
            break;
          case "2":
            workloadCondition.textContent = "Not very good";
            break;
          case "3":
            workloadCondition.textContent = "It's fair";
            break;
          case "4":
            workloadCondition.textContent = "Pretty good";
            break;
          case "5":
            workloadCondition.textContent = "The best";
            break;
        }
      });
    }

    // Confirm Score Click Event
    document
      .getElementById("workload-confirm-give-score")
      .addEventListener("click", function () {
        updateWellbeingScore("workload", selectedWorkloadScore);
      });
  }
});

// Anxiety Card
const anxietyCardContainer = document.getElementById("anxiety");
const initialAnxietyTitle =
  document.getElementsByClassName("anxiety-content")[0];
const anxietyGiveScoreBtn = document.getElementById(
  "anxiety-give-score-button"
);

let selectedAnxietyScore;
anxietyGiveScoreBtn.addEventListener("click", () => {
  if (initialAnxietyTitle) {
    anxietyCardContainer.innerHTML = `
      <div class="give-score-anxiety-content">
        <p class="anxiety-score" id="score1">1</p>
        <p class="anxiety-score" id="score2">2</p>
        <p class="anxiety-score" id="score3">3</p>
        <p class="anxiety-score" id="score4">4</p>
        <p class="anxiety-score" id="score5">5</p>
      </div>
      <p id="anxiety-condition"></p>
      <button type="submit" name="submit"
        id="anxiety-confirm-give-score"
        style="margin: 20px; border: 1px solid rgb(61, 60, 60); padding: 10px; background: transparent; box-shadow: 5px 5px black; cursor: pointer;">
        Confirm score
      </button>`;

    let anxietyCondition = document.getElementById("anxiety-condition");
    let anxietyScores = document.getElementsByClassName("anxiety-score");

    for (let i = 0; i < anxietyScores.length; i++) {
      anxietyScores[i].addEventListener("click", function () {
        selectedAnxietyScore = this.textContent;
        switch (selectedAnxietyScore) {
          case "1":
            anxietyCondition.textContent = "Bad";
            break;
          case "2":
            anxietyCondition.textContent = "Not very good";
            break;
          case "3":
            anxietyCondition.textContent = "It's fair";
            break;
          case "4":
            anxietyCondition.textContent = "Pretty good";
            break;
          case "5":
            anxietyCondition.textContent = "The best";
            break;
        }
      });
    }

    // Confirm Score Click Event
    document
      .getElementById("anxiety-confirm-give-score")
      .addEventListener("click", function () {
        updateWellbeingScore("anxiety", selectedAnxietyScore);
      });
  }
});

// Add this code to handle the button click event
document
  .getElementById("add-scores-button")
  .addEventListener("click", function () {
    updateWellbeingScore("happiness", selectedHappyScore);
    updateWellbeingScore("workload", selectedWorkloadScore);
    updateWellbeingScore("anxiety", selectedAnxietyScore);
  });

// Function to handle the AJAX request for updating scores
function updateWellbeingScore(type, score) {
  console.log({
    happiness: selectedHappyScore || 0,
    workload: selectedWorkloadScore || 0,
    anxiety: selectedAnxietyScore || 0,
  });
  $.ajax({
    url: "../../student_staff/api/wellBeingAPI.php",
    type: "POST",
    data: {
      happiness: selectedHappyScore || 0,
      workload: selectedWorkloadScore || 0,
      anxiety: selectedAnxietyScore || 0,
    },
    success: function (response) {
      try {
        const result = JSON.parse(response);
        if (result.status === "success") {
          console.log("Record updated successfully");
        } else {
          console.log("Failed to update record: " + result.message);
        }
      } catch (e) {
        console.error("Error parsing JSON:", e);
        console.error("Response:", response);
        console.log(
          "Failed to parse server response. Check console for details."
        );
      }
    },
    error: function (xhr, status, error) {
      console.error("AJAX error:", status, error);
      console.error("Response:", xhr.responseText);
      console.log(
        "An error occurred while making the request. Check console for details."
      );
    },
  });
}
