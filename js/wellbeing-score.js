//happy card
const happyCardContainer = document.getElementById("happy");
const initialHappyTitle = document.getElementsByClassName("happy-content")[0];
const happyGiveScoreBtn = document.getElementById("happy-give-score-button");
const newHappyContent = `
     <div class="give-score-happy-content">
            <p class="happy-score" id="score1">1</p>
            <p class="happy-score" id="score2">2</p>
            <p class="happy-score" id="score3">3</p>
            <p class="happy-score" id="score4">4</p>
            <p class="happy-score" id="score5">5</p>
     </div>
     <p id="happy-condition"></p>
     <button
            id="confirm-give-score"
            style="
              margin: 20px;
              border: 1px solid rgb(61, 60, 60);
              padding: 10px;
              background: transparent;
              box-shadow: 5px 5px black;
              cursor: pointer;
            "
          >
            Confirm score
    </button>   
`;

let happyCondition;
let happyScore;
happyGiveScoreBtn.addEventListener("click", () => {
  if (initialHappyTitle.classList.contains("happy-content")) {
    happyCardContainer.innerHTML = newHappyContent;
    happyCondition = document.getElementById("happy-condition");
    happyScore = document.getElementsByClassName("happy-score");
    for (let i = 0; i < happyScore.length; i++) {
      happyScore[i].addEventListener("click", () => {
        // happyScore[i].style.borderBottom = "2px solid black";
        switch (happyScore[i].textContent) {
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
        }
      });
    }
  }
});

//workload management card
const workloadCardContainer = document.getElementById("workload");
const initialWorkloadTitle =
  document.getElementsByClassName("workload-content")[0];
const workloadGiveScoreBtn = document.getElementById(
  "workload-give-score-button"
);
const newWorkloadContent = `
     <div class="give-score-workload-content">
            <p class="workload-score" id="score1">1</p>
            <p class="workload-score" id="score2">2</p>
            <p class="workload-score" id="score3">3</p>
            <p class="workload-score" id="score4">4</p>
            <p class="workload-score" id="score5">5</p>
     </div>
     <p id="workload-condition"></p>
     <button
            id="workload-confirm-give-score"
            style="
              margin: 20px;
              border: 1px solid rgb(61, 60, 60);
              padding: 10px;
              background: transparent;
              box-shadow: 5px 5px black;
              cursor: pointer;
            "
          >
            Confirm score
    </button>   
`;

let workloadCondition;
let workloadScore;
workloadGiveScoreBtn.addEventListener("click", () => {
  if (initialWorkloadTitle.classList.contains("workload-content")) {
    workloadCardContainer.innerHTML = newWorkloadContent;
    workloadCondition = document.getElementById("workload-condition");
    workloadScore = document.getElementsByClassName("workload-score");
    for (let i = 0; i < workloadScore.length; i++) {
      workloadScore[i].addEventListener("click", () => {
        // happyScore[i].style.borderBottom = "2px solid black";
        switch (workloadScore[i].textContent) {
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
        }
      });
    }
  }
});

//anxiety
const anxietyCardContainer = document.getElementById("anxiety");
const initialAnxietyTitle =
  document.getElementsByClassName("anxiety-content")[0];
const anxietyGiveScoreBtn = document.getElementById(
  "anxiety-give-score-button"
);
const newAnxietyContent = `
     <div class="give-score-anxiety-content">
            <p class="anxiety-score" id="score1">1</p>
            <p class="anxiety-score" id="score2">2</p>
            <p class="anxiety-score" id="score3">3</p>
            <p class="anxiety-score" id="score4">4</p>
            <p class="anxiety-score" id="score5">5</p>
     </div>
     <p id="anxiety-condition"></p>
     <button
            id="anxiety-confirm-give-score"
            style="
              margin: 20px;
              border: 1px solid rgb(61, 60, 60);
              padding: 10px;
              background: transparent;
              box-shadow: 5px 5px black;
              cursor: pointer;
            "
          >
            Confirm score
    </button>   
`;

let anxietyCondition;
let anxietyScore;
anxietyGiveScoreBtn.addEventListener("click", () => {
  if (initialAnxietyTitle.classList.contains("anxiety-content")) {
    anxietyCardContainer.innerHTML = newAnxietyContent;
    anxietyCondition = document.getElementById("anxiety-condition");
    anxietyScore = document.getElementsByClassName("anxiety-score");
    for (let i = 0; i < anxietyScore.length; i++) {
      anxietyScore[i].addEventListener("click", () => {
        // happyScore[i].style.borderBottom = "2px solid black";
        switch (anxietyScore[i].textContent) {
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
        }
      });
    }
  }
});
