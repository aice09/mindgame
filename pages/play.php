<br>
<ol class="breadcrumb">
  <li><a href="index.php">Home</a></li>
  <li>Play</li>
</ol>
<div class="controller">
    <div class="wrapper">
      <ul class="cards">
        <li class="card">
          <div class="view front-view">
            <img src="dist/img/fixtures/default/que_icon.svg" alt="icon">
          </div>
          <div class="view back-view">
            <img src="dist/img/fixtures/default/img-1.png" alt="card-img">
          </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="dist/img/fixtures/default/que_icon.svg" alt="icon">
          </div>
          <div class="view back-view">
            <img src="dist/img/fixtures/default/img-2.png" alt="card-img">
          </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="dist/img/fixtures/default/que_icon.svg" alt="icon">
          </div>
          <div class="view back-view">
            <img src="dist/img/fixtures/default/img-3.png" alt="card-img">
          </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="dist/img/fixtures/default/que_icon.svg" alt="icon">
          </div>
          <div class="view back-view">
            <img src="dist/img/fixtures/default/img-4.png" alt="card-img">
          </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="dist/img/fixtures/default/que_icon.svg" alt="icon">
          </div>
          <div class="view back-view">
            <img src="dist/img/fixtures/default/img-5.png" alt="card-img">
          </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="dist/img/fixtures/default/que_icon.svg" alt="icon">
          </div>
          <div class="view back-view">
            <img src="dist/img/fixtures/default/img-6.png" alt="card-img">
          </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="dist/img/fixtures/default/que_icon.svg" alt="icon">
          </div>
          <div class="view back-view">
            <img src="dist/img/fixtures/default/img-5.png" alt="card-img">
          </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="dist/img/fixtures/default/que_icon.svg" alt="icon">
          </div>
          <div class="view back-view">
            <img src="dist/img/fixtures/default/img-6.png" alt="card-img">
          </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="dist/img/fixtures/default/que_icon.svg" alt="icon">
          </div>
          <div class="view back-view">
            <img src="dist/img/fixtures/default/img-1.png" alt="card-img">
          </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="dist/img/fixtures/default/que_icon.svg" alt="icon">
          </div>
          <div class="view back-view">
            <img src="dist/img/fixtures/default/img-2.png" alt="card-img">
          </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="dist/img/fixtures/default/que_icon.svg" alt="icon">
          </div>
          <div class="view back-view">
            <img src="dist/img/fixtures/default/img-3.png" alt="card-img">
          </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="dist/img/fixtures/default/que_icon.svg" alt="icon">
          </div>
          <div class="view back-view">
            <img src="dist/img/fixtures/default/img-4.png" alt="card-img">
          </div>
        </li>
        <div class="details">
          <p class="time">Time: <span><b>20</b>s</span></p>
          <p class="flips">Flips: <span><b>0</b></span></p>
          <button>Refresh</button>
        </div>
      </ul>
    </div>
    </div>
    <!--modal display -->
    <div class="modal" id="modal-id>
      <div class="modal-content">
        <span class="close">&times;</span>
        <p>You have <span class="flips">0</span> flips left.</p>
        <p>You have <span class="time">20</span> seconds left.</p>
        <button>Play Again</button>
      </div>

    <script>
        const cards = document.querySelectorAll(".card"),
timeTag = document.querySelector(".time b"),
flipsTag = document.querySelector(".flips b"),
refreshBtn = document.querySelector(".details button");

let maxTime = 0;
let timeLeft = maxTime;
let flips = 0;
let matchedCard = 0;
let disableDeck = false;
let isPlaying = false;
let cardOne, cardTwo, timer;

function initTimer() {
    if(matchedCard == 6) {
        return clearInterval(timer);
    }
    timeLeft++;
    timeTag.innerText = timeLeft;
}

function flipCard({target: clickedCard}) {
    if(!isPlaying) {
        isPlaying = true;
        timer = setInterval(initTimer, 1000);
    }
    if(clickedCard !== cardOne && !disableDeck) {
        flips++;
        flipsTag.innerText = flips;
        clickedCard.classList.add("flip");
        if(!cardOne) {
            return cardOne = clickedCard;
        }
        cardTwo = clickedCard;
        disableDeck = true;
        let cardOneImg = cardOne.querySelector(".back-view img").src,
        cardTwoImg = cardTwo.querySelector(".back-view img").src;
        matchCards(cardOneImg, cardTwoImg);
    }
}


function matchCards(img1, img2) {
    if(img1 === img2) {
        matchedCard++;
        if(matchedCard == 6 ) {
            gamestatus="finish";
            timefinish = timer;
            totalflips =flipsTag.innerText;

            $.ajax({
            type: 'POST',
            url: 'pages_exe/recordgame_exe.php',
            data: {
                gamestatus: gamestatus,
                timefinish: timefinish,
                totalflips: totalflips
            },
            success: function(data, status) {
                if (data != 999) {
                    console.log(data);
                    Swal.fire(
                        'Good job!',
                        'Your game will automatically recorded!',
                        'success'
                    ).then(function() {
    window.location = "index.php?page=results";
});
                } else {
                    Swal.fire(
                        'Good job!',
                        'Your game has not recorded!',
                        'error'
                    ).then(function() {
    window.location = "index.php?page=results";
});
                }
            }
        });
        return false;
           console.log(timer)
           console.log(flipsTag.innerText)
            return clearInterval(timer);
        }
        cardOne.removeEventListener("click", flipCard);
        cardTwo.removeEventListener("click", flipCard);
        cardOne = cardTwo = "";
        return disableDeck = false;
    }

    setTimeout(() => {
        cardOne.classList.add("shake");
        cardTwo.classList.add("shake");
    }, 400);

    setTimeout(() => {
        cardOne.classList.remove("shake", "flip");
        cardTwo.classList.remove("shake", "flip");
        cardOne = cardTwo = "";
        disableDeck = false;
    }, 1200);
}

function shuffleCard() {
    timeLeft = maxTime;
    flips = matchedCard = 0;
    cardOne = cardTwo = "";
    clearInterval(timer);
    timeTag.innerText = timeLeft;
    flipsTag.innerText = flips;
    disableDeck = isPlaying = false;

    let arr = [1, 2, 3, 4, 5, 6, 1, 2, 3, 4, 5, 6];
    arr.sort(() => Math.random() > 0.5 ? 1 : -1);

    cards.forEach((card, index) => {
        card.classList.remove("flip");
        let imgTag = card.querySelector(".back-view img");
        setTimeout(() => {
            imgTag.src = `dist/img/fixtures/default/img-${arr[index]}.png`;
        }, 500);
        card.addEventListener("click", flipCard);
    });
}


//if card match all console log the time and flips
function recordGame(){
    //get the time and flips

}


shuffleCard();

refreshBtn.addEventListener("click", shuffleCard);

cards.forEach(card => {
    card.addEventListener("click", flipCard);
});

    </script>

    <style>
        /* Import Google Font - Poppins */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
.controller *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
.controller p{
  font-size: 20px;
}
.controller{
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;/* 
  background: #6563ff; */
}
::selection{
  color: #fff;/* 
  background: #6563ff; */
}
.wrapper{
  padding: 25px;/* 
  background: #f8f8f8; */
  border-radius: 10px;
  box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}
.cards, .card, .view, .details, p{
  display: flex;
  align-items: center;
  justify-content: center;
}
.cards{
  height: 350px;
  width: 350px;
  flex-wrap: wrap;
  justify-content: space-between;
}
.cards .card{
  cursor: pointer;
  position: relative;
  perspective: 1000px;
  transform-style: preserve-3d;
  height: calc(100% / 4 - 10px);
  width: calc(100% / 4 - 10px);
}
.card.shake{
  animation: shake 0.35s ease-in-out;
}
@keyframes shake {
  0%, 100%{
    transform: translateX(0);
  }
  20%{
    transform: translateX(-13px);
  }
  40%{
    transform: translateX(13px);
  }
  60%{
    transform: translateX(-8px);
  }
  80%{
    transform: translateX(8px);
  }
}
.cards .card .view{
  width: 100%;
  height: 100%;
  user-select: none;
  pointer-events: none;
  position: absolute;
  background: #fff;
  border-radius: 7px;
  backface-visibility: hidden;
  transition: transform 0.25s linear;
  box-shadow: 0 3px 10px rgba(0,0,0,0.1);
}
.card .front-view img{
  max-width: 17px;
}
.card .back-view{
  transform: rotateY(-180deg);
}
.card .back-view img{
  max-width: 40px;
}
.card.flip .front-view{
  transform: rotateY(180deg);
}
.card.flip .back-view{
  transform: rotateY(0);
}

.details{
  width: 100%;
  margin-top: 15px;
  padding: 0 20px;
  border-radius: 7px;
  background: #fff;
  height: calc(100% / 4 - 30px);
  justify-content: space-between;
  box-shadow: 0 3px 10px rgba(0,0,0,0.1);
}
.details p{
  font-size: 18px;
  height: 17px;
  padding-right: 18px;
  border-right: 1px solid #ccc;
}
.details p span{
  margin-left: 8px;
}
.details p b{
  font-weight: 500;
}
.details button{
  cursor: pointer;
  font-size: 14px;
  color: #6563ff;
  border-radius: 4px;
  padding: 4px 11px;
  background: #fff;
  border: 2px solid #6563ff;
  transition: 0.3s ease;
}
.details button:hover{
  color: #fff;
  background: #6563ff;
}

@media screen and (max-width: 700px) {
  .cards{
    height: 350px;
    width: 350px;
  }
  .card .front-view img{
    max-width: 16px;
  }
  .card .back-view img{
    max-width: 40px;
  }
}

@media screen and (max-width: 530px) {
  .cards{
    height: 300px;
    width: 300px;
  }
  .card .back-view img{
    max-width: 35px;
  }
  .details{
    margin-top: 10px;
    padding: 0 15px;
    height: calc(100% / 4 - 20px);
  }
  .details p{
    height: 15px;
    font-size: 17px;
    padding-right: 13px;
  }
  .details button{
    font-size: 13px;
    padding: 5px 10px;
    border: none;
    color: #fff;
    background: #6563ff;
  }
}
    </style>