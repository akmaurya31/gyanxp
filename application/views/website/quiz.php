<?php include('headerquiz.php');?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style type="text/css">
      .header-style1 {
        box-shadow: none;
        background: linear-gradient(45deg, #ff3d3f, #3368e9);
      }

      .attempted {
        background-color: green !important;
        color: white !important;
        border-radius: 50%;
        }

        /* When the question is both attempted and current (Yellow background) */
        .attempted.current {
            background-color: #fbb714 !important;
            color: white !important;
        }

      /* Red color for not-attempted questions */
      .not-attempted1 {
          background-color: red;
          color: white;
      }

      #finish-exam{
        cursor: pointer;
      }


</style>
<section>
<div class="container">
<div class="quiz-test">
<button type="button" id="myBtn" style="display:none;"></button>
<div class="main-container">
<div class="left-container">
<div>
<div class="banner">
<div class="logo">
<img decoding="async" src="https://gyanxp.com/wp-content/plugins/sprinix/admin/asset/images/upload/banner/6659f5d63b8a3.png" alt="banner" >
</div>
<div class="exam-details">
<div class="details">
<div>
<label>Exam Name:</label>
<span id="quiz-name"><?php echo $quizname; ?></span>
</div>
<div>
<label>Name:</label>
<span id="quiz-user-name"><?php echo $stuname; ?></span>
<br/>
<span class="heading-text" style="font-size: 11px; color:green">Wait 30 Second</span>
</div>
</div>
<div class="details">
<div>
<label>Login ID:</label>
<span id="userLoginID" ><?php echo $stuid; ?></span>
</div>
<div>
<label>Language:</label>
<span>HINDI/ENGLISH</span>
</div>   
</div>
</div>
<div class="profile-image">
  
<!-- <img decoding="async" src="https://gyanxp.com/wp-content/plugins/sprinix/frontend/asset/image/profile-pic.png" alt="profile-image" width="100%" height="100%"> -->
<?php //print_r($studentDetail); die("Asdfa"); ?>
<img decoding="async" src="<?php echo base_url();?>uploads/<?php echo $studentDetail->photo_path;?>" alt="profile-image" width="100%" height="100%">


</div>
</div>
<div class="left-container-top">
<div class="heading">
<div class="heading-text">
<span class="text">QN.</span> <span class="number sqn" id="current-question-info">1</span>
</div>
<div class="heading-text">
<span class="text">Total Marks: </span>
<span class="number total_mark"> 100 </span>
</div>
<div class="heading-text">
<span class="text">Total Time: </span>
<span class="number total_time"> 90 Minutes </span>
</div>
<div class="heading-text">
<span class="text">Remaining Time:</span>
<span class="number left-time" id="remaining_time"> 00:00:00</span>
</div>

<div class="heading-text">
<span class="text">Mark:</span>
<span class="number"> 1 </span>
</div>
</div>

<div class="content">
<div class="question-section">
<div class="hindi-question">
<form action="#">
<p class="question" id="question">
  <span class="qhi" lang="hi">elernent उस टेक्स्ट को परिभाषित करता है जिसे किसी दस्तावेज़ से हटा दिया गया है। ब्राउज़र उन्हें _________ रूप में प्रदर्शित करता है</span> 
   <span  class="qen" lang="en">elernent defines text that has been deleted from a document. Browser display them as</span>
  
  </p>
<div class="choice-option">
    <div class="choice-answer" id="answer_A" style="display: flex;"><span id="option_a_en">(A) Red colouren</span>  <span id="option_a_hi">(A) Red colour</span></div>
    <div class="choice-answer" id="answer_B" style="display: flex;"><span id="option_b_en">(B) Black colour</span>  <span id="option_b_hi">(B) Black colour</span></div>
    <div class="choice-answer" id="answer_C" style="display: flex;"><span id="option_c_en">(C) Stricke through</span>  <span id="option_c_hi">(C) Stricke through</span></div>
    <div class="choice-answer" id="answer_D" style="display: flex;"><span id="option_d_en">(D) Bold</span>  <span id="option_d_hi">(D) Bold</span></div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<div class="footer">
<div class="select">
<div class="choice-answer">
<div class="choice-answer-check">
<input type="radio" class="radio-button" name="ans_option" id="answer_A_value" value="A">
<span id="answer_A_option">A</span>
</div>
<div class="choice-answer-check">
<input type="radio" class="radio-button" name="ans_option" id="answer_B_value" value="B">
<span id="answer_B_option">B</span>
</div>
<div class="choice-answer-check">
<input type="radio" class="radio-button" name="ans_option" id="answer_C_value" value="C">
<span id="answer_C_option">C</span>
</div>
<div class="choice-answer-check">
<input type="radio" class="radio-button" name="ans_option" id="answer_D_value" value="D">
<span id="answer_D_option">D</span>
</div>
</div>
<div class="submission-button">
<div class="submit-button">
<button type="button" id="submit-button" >Submit Answer</button>
</div>
<div class="reset-button">
<button type="button" id="reset-button" disabled>Reset Answer</button>
</div>
</div>
</div>            
</div>
</div>
<div class="right-container">
<div class="right-container-top">
<div class="finish-exam">
<div class="exam-finish">
<button type="button" id="finish-exam" class="finish-exam-disabled">Exam Finished</button>
</div>
<div class="exam-status">Question Status</div>
<div class="status">
<div class="question-status">
<span>Attempted</span> 
<span class="dot attempt"></span> 
<span id="attempted-count">0</span>
</div>
<div class="question-status">
<span>Not Attempted</span> 
<span class="dot not-attempt"></span>
<span id="not-attempted-count">0</span>
</div>
<div class="question-status">
<span>Current</span>
<span class="dot current"></span> 
<span id="current-question-info">1</span>
</div>
</div>
<div class="choose-question">
<span>Choose Question</span>
</div>
</div>

<div id="number-counter" class="total-question">
  <div class="question-number current" id="question-number-1">1</div>
  <div class="question-number" id="question-number-6">6</div>
</div>


</div>   
<div class="review" id="result" style="display:none;">
<button type="button">See Result</button>
</div>
<div id="myModal" class="modal">
<div class="modal-content">
<div class="content">
<p>
<p style="text-align: center"><strong><span style="color: #ff0000">INSTRUCTIONS:- </span></strong></p>


<hr />

<ul>
<li>Total Questions: <span style="color: #ff0000">100 MCQ</span></li>
<li>Total Time: <span style="color: #ff0000">90 Minutes</span></li>
<li><strong><span style="color: #ff0000">Note:</span></strong> After answering all the questions, click on Exam Finished / सभी प्रश्नों के उत्तर देने के बाद Exam Finished पर Click करे</li>
</ul>

<hr />
<p style="text-align: center">*************** <strong><span style="color: #0000ff">GOOD LUCK</span> </strong>*****************</p>                        </p>
</div>
<div class="quiz-username">
<form>
<input class="username-input" type="text" id="fname" name="fname" placeholder="Enter Your Name">
</form>
</div>
<div class="start-finish-button">
<button type="button" id="start-exam">Start Exam</button>
</div>
</div>
</div>
<div id="resultModal" class="modal">
<div class="modal-content">
<div class="model-content-header">
<h2>&#x1F389;  Your Result &#x1F389;</h2>

<span class="close" id="close-result">&times;</span>
</div>
<div class="model-content-result"> 
<div id="resultDisplay"></div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>

<script>
let quizId = <?php echo ($this->session->userdata('quiz_id')) ? $this->session->userdata('quiz_id') : 1; ?>;
// alert(quizId);

let currentQuestion = 1;
let totalQuestions = 0;
let timerMinutes = 0;
let global_quesIds = []; 

$(document).ready(function () {
  $.post('<?php echo base_url();?>/Quizanswer/get_quiz_meta', { quiz_id: quizId }, function (data) {
    let res = JSON.parse(data); 
    totalQuestions = res.total_questions;
    timerMinutes = res.duration;

    $('.sqn').text(1);
    $('.total_time').text(timerMinutes+" Minutes");
    $('.total_mark').text(totalQuestions);

    $('#attempted-count').text(res.qanswer);
    $('#not-attempted-count').text(parseInt(totalQuestions)-parseInt(res.qanswer));

    startTimer(timerMinutes * 60); // Convert to seconds


    let quesIds = typeof res === 'string' ? JSON.parse(res.quesIds || res) : res.quesIds || res;
    let html = '';


    global_quesIds = (res.quesIds || []).sort((a, b) => a - b);


    // res.qanswerAtt  ["9", "3", "2"]  

    global_quesIds.forEach((id, index) => {

     let isAttempted = res.qanswerAtt.includes(id.toString());

    //  html += `<div class="qq question-number${index === 0 ? ' current' : ''}" data-id="${id}" id="question-number-${index + 1}">${index + 1}</div>`;

      html += `<div class="qq question-number ${index === 0 ? 'current' : ''} ${isAttempted ? 'attempted' : ''}" data-id="${id}" id="question-number-${index + 1}">${index + 1}</div>`;
    });

    let currentQuestion = (Array.isArray(quesIds) && quesIds.length > 0) ? quesIds[0] : 1; // fallback to 1
    // alert(currentQuestion);
    loadQuestion(currentQuestion);
    $('#number-counter').html(html);

  });
});


function getCurrentIndexPlusOne(currentId) {
            const index = global_quesIds.indexOf(currentId.toString());

            if (index !== -1) {
              return index + 1; // 1-based index for display
            } else {
              return null; // not found
            }
        }



let currentQuestionNumber = 1;
let user_id=<?php echo $stuid;   ?>;
function loadQuestion(questionNumber) {
  currentQuestionNumber = questionNumber; // set kar diya
  // $('.sqn').text(currentQuestionNumber);

  let sqn= getCurrentIndexPlusOne(currentQuestionNumber)
  $('.sqn').text(sqn);

  $.post('<?php echo base_url();?>/Quizanswer/get_question', {
    quiz_id: quizId,
    question_number: questionNumber,
    user_id: user_id
  }, function (data) {
    let res = JSON.parse(data);
    console.log(res,"rrrr");
    // $('#question').html(res.question.question_text);
    $('.qhi').html(res.question.question_en);
    $('.qen').html(res.question.question_hi);

    $('#option_a_hi').text(res.question.option_a_hi);
    $('#option_b_hi').text(res.question.option_b_hi);
    $('#option_c_hi').text(res.question.option_c_hi);
    $('#option_d_hi').text(res.question.option_d_hi);

    $('#option_a_en').text(res.question.option_a_en);
    $('#option_b_en').text(res.question.option_b_en);
    $('#option_c_en').text(res.question.option_c_en);
    $('#option_d_en').text(res.question.option_d_en);

    $('input[name="ans_option"]').prop('checked', false); // Clear selection

    if (res.selected_answer && res.selected_answer.selected_answer) {
      const selected = res.selected_answer.selected_answer; // like "A", "B", etc.
      console.log("Answer selected:", selected);
      $('#answer_' + selected + '_value').prop('checked', true);
    }
  });
}


$('#next-button').click(function () {
  if (currentQuestion < totalQuestions) {
    currentQuestion++;
    loadQuestion(currentQuestion);
  }
});


$('.question-number').click(function () {
  currentQuestion = parseInt($(this).text());
  loadQuestion(currentQuestion);
});

$(document).on('click', '.qq', function () {
  let currentQuestion = $(this).data('id'); 
  $('.qq').removeClass('current');
  $(this).addClass('current');

  loadQuestion(currentQuestion);
});


function startTimer(duration) {
    let timer = duration;

    let interval = setInterval(function () {
        let hours = Math.floor(timer / 3600);
        let minutes = Math.floor((timer % 3600) / 60);
        let seconds = timer % 60;

        $('#remaining_time').text(
            String(hours).padStart(2, '0') + ":" +
            String(minutes).padStart(2, '0') + ":" +
            String(seconds).padStart(2, '0')
        );

   // $('#remaining_time').text(minutes + ":" + (seconds < 10 ? "0" : "") + seconds);

    if (--timer < 0) {
      clearInterval(interval);
      alert("Time's up!");
      // Auto-submit logic here
    }
  }, 1000);
}


$('input[name="xxans_option"]').change(function () {
  let selected = $(this).val();
  $.post('<?php echo base_url();?>/Quizanswer/save_answer', {
    quiz_id: quizId,
    question_number: currentQuestion,
    selected_answer: selected
  });
});



 
$(document).on('click', '#submit-button', function () {
  let selected = $('input[name="ans_option"]:checked').val(); // get selected radio

  if (!selected) {
    alert("Please select an answer before submitting!");
    return;
  }

  // $.post('Quizanswer/save_answer22', {
  //   quiz_id: quizId,
  //   question_number: currentQuestionNumber,
  //   selected_answer: selected
  // }, function (response) {
  //    $('#attempted-count').html(response.attempted)
  //    $('#not-attempted-count').html(response.not_attempted)
  // }, 'json');


  $.post('<?php echo base_url();?>/Quizanswer/save_answer', {
        quiz_id: quizId,
        question_number: currentQuestionNumber,
        selected_answer: selected
    }, function (response) {
        $('#attempted-count').html(response.attempted);
        $('#not-attempted-count').html(response.not_attempted);

        // Now load next question after saving answer
        loadNextQuestion();
    }, 'json');


        function loadNextQuestion() {
          nextQuestionId=getNextQuestionId(currentQuestionNumber);
          $(".question-number").removeClass("current");  
          $(`.question-number[data-id='${nextQuestionId}']`).addClass("current");
          loadQuestion(nextQuestionId); // Assuming loadQuestion is a function to load question content
        }


        function getNextQuestionId(currentId) {
          const index = global_quesIds.indexOf(currentId.toString());
          
          if (index !== -1 && index < global_quesIds.length - 1) {
            return global_quesIds[index + 1];
          } else {
            return null; // End of array or not found
          }
        }

      

});

const baseUrl = "<?= base_url() ?>";
document.getElementById('finish-exam').addEventListener('click', function () {
    window.location.href = baseUrl + 'quizresult';
});

</script>

<?php include('footerquiz.php');?>
