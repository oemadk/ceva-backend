<div class="container">
  <div class="logo"><img src="https://i.ibb.co/gWWp5mh/cc-logo.png" alt="cc-logo" border="0">
    <div class="c-name">
      Creditclan
    </div>
  </div>
  <div class="illustration">
    <div class="hgroup">
    <span class="name">Hello, Ahmed Shafee</span>
    <h1>Thank you for Signing Up</h1>
      <div class="thumbs">
      <a href="https://imgbb.com/"><img src="https://i.ibb.co/2g7tS2d/good.png" alt="good" border="0"></a>
    </div>
    <p class="rad">Rad stuff is here</p>
    </div>
<!--     <a href="https://ibb.co/kSxWRDz"><img src="https://i.ibb.co/mcGMLyd/undraw-super-thank-you-obwk.png" alt="undraw-super-thank-you-obwk" border="0"></a> -->
  </div>
<!--   <span class="separator"></span> -->
  <div class="hgroup">
    <p>Please revise your company's Balance at Ceva's at 12/12/2019
      <br><br>
      Which is 12,000 LE
      <p>

    </p>

        <form>
  <input type="checkbox" id="fruit1" name="fruit-1" value="Apple">
  <label for="fruit1">Agree</label>

    <input type="checkbox" id="fruit2" name="fruit-2" value="no">
  <label for="fruit2">Disagree</label>
</form>
      <span class="raised">Your Balance </span>
      <input type="text" name="">
    <p>PLease note that the overdue that needs to be paid immediatley is  15,000 LE </p>
    
    <p>and the due balance this month is 12,000 <br>
    </p>
    </p>
    
  </div>
  <div class="button-wrap">
  <button class="explore">
    Close
  </button>  
  </div>

</div>


<style type="text/css">
  @import url('https://fonts.googleapis.com/css?family=Poppins');

* {
  margin: 0;
  padding: 0;
  font-family: Poppins, 'Segoe UI', 'Arial', 'san serif';
}

img {
  display: inline-block;
}
.container {
  margin: 20px auto;
  border-radius: 4px;
  border: 1px solid rgba(0, 0, 0, .1);
  // border-top: 3px solid #016FB9;
  min-height: 100px;
  position: relative;
  &::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 3px;
    background: linear-gradient(to right, #0267C1, #D65108);
  }
}

.logo {
  display: flex;
  margin: 30px auto 0;
  align-items: center;
  justify-content: center;
  // padding: 20px;
  a {
    display: block;
    width: 30px;
    height: 30px;
    // overflow: hidden;
  }
  img {
    width: 40px;
  }
  .c-name {
    display: inline-block;
    font-weight: 600;
  }
}

.thumbs {
  width: 100px;
  margin: auto;
  height: 136px;
  img {
    width: 100%;
  }
}

.illustration {
  width: 100%;
  text-align: center;
  box-shadow: 0 10px 20px -5px rgba(0, 0, 0, .05);
  border-radius: 0 0 50% 50% / 1%;
  text-align: center;
}

.illustration img {
  width: 70%;
  margin: 50px auto;
}

.separator {
  display: block;
  height: 3px;
  width: 70%;
  margin: 10px auto;
  background-color: rgba(0, 0, 0, .05);
  border-radius: 10px;
  position: relative;
  overflow: hidden;
  &::before, &::after {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 33%;
    border-radius: inherit;
    opacity: .05;
  }
  &::before {
    left: 0;
    background: #EFA00B;
  }
  &::after {
    left: initial;
    right: 0;
    background: #D65108;
  }
}

.hgroup {
  text-align: center;
  padding: 50px 30px 30px;
}

.name {
  display: block;
  // text-transform: uppercase;
  // margin-bottom: 5px;
  color: #0267C1;
  font-weight: 600;
  font-size: 1.1rem;
}

.hgroup h1 {
  font-size: 20px;
  font-weight: 600;
  color: #333;
}

.hgroup h2 {
  font-size: 19px;
}

.hgroup p {
  font-size: 15px;
  color: slategrey;
  margin-top: 15px;
  text-align: justify;
  line-height: 25px;
}

.items {
  padding: 30px;
  display: grid;
  grid-template-columns: repeat(2, 1fr);
}

.item {
  margin-bottom: 10px;
  text-align: center;
  width: 100%;
  margin: 0 auto 50px;
}


.item .icon {
    margin-bottom: 10px;
}

.item .icon img {
  width: 60px;
}

.item .title {
  margin-bottom: 5px;
  font-size: 16px;
  font-weight: 600;
}

.item .subtitle {
  font-size: 13px;
  color: slategrey;
  padding: 1rem;
}

.button-wrap {
  text-align: center;
  padding: 2rem;
}

button.explore {
  padding: 15px 25px;
  font: inherit;
  background: linear-gradient(to right, #0267C1, #0280EF);
  border-radius: 50px;
  border: 0;
  color: #fff;
  margin: auto;
  display: inline-block;
  transition: all .2s ease-in-out;
  cursor: pointer;
  box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
}

button.explore:hover {
  transform: translateY(-5px);
    box-shadow: 0 15px 10px -7px rgba(0, 0, 0, .1);
}


footer {
  font-size: 12px;
  color: slategrey;
  text-align: center;
  padding: 30px;
}

.rad {
  margin: 0!important;
  text-align: center!important;
  font-size: 18px!important;
}

.raised {
  font-size: 16px;
  color: #777;
  display: block;
  color: steelblue;
}

input[type=checkbox] + label {
  display: block;
  margin: 0.2em;
  cursor: pointer;
  padding: 0.2em;
}

input[type=checkbox] {
  display: none;
}

input[type=checkbox] + label:before {
  content: "\2714";
  border: 0.1em solid #000;
  border-radius: 0.2em;
  display: inline-block;
  width: 1em;
  height: 1em;
  padding-left: 0.2em;
  padding-bottom: 0.3em;
  margin-right: 0.2em;
  vertical-align: bottom;
  color: transparent;
  transition: .2s;
}

input[type=checkbox] + label:active:before {
  transform: scale(0);
}

input[type=checkbox]:checked + label:before {
  background-color: MediumSeaGreen;
  border-color: MediumSeaGreen;
  color: #fff;
}

input[type=checkbox]:disabled + label:before {
  transform: scale(1);
  border-color: #aaa;
}

input[type=checkbox]:checked:disabled + label:before {
  transform: scale(1);
  background-color: #bfb;
  border-color: #bfb;
}
</style>