<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>給与管理システム</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
  </head>
  <body>

    <div id="logOutWrap">
      <div id="logOutBox">
        <a id="logOut" href="login.php">ログアウト</a>
        <a id="salaryListBack" href="salaryList.php">一覧画面</a>
      </div>
    </div>

    <h1 class="pageTitle" data-en="SalaryRegist"><span>給与登録</span></h1>

    <main>

      <!-- 給与登録フォーム -->
      <form action="#" method="post">

        <!-- 氏名 -->
        <div class="playTextboxWrap">
          <label class="playLabelSelectTalentId" for="userId">氏名</label>
          <select class="textInput" name="talentId">
            <option value=""></option>
          </select>
        </div>

        <!-- 担当者 -->
        <div class="playTextboxWrap">
          <label class="playLabelSelectManagerId" for="userId">担当者</label>
          <select class="textInput" name="managerId">
            <?php foreach($managers['managers'] as $manager): ?>
              <?php if($manager['id'] == $_POST['managerUser']){ ?>
                <option value="<?php echo $manager['id'] ?>" selected><?php echo $manager['name'] ?></option>
              <?php } else if ($manager['id'] == $_POST['managerId']) { ?>
                <option value="<?php echo $manager['id'] ?>" selected><?php echo $manager['name'] ?></option>
              <?php } ?>
              <option value="<?php echo $manager['id'] ?>" ><?php echo $manager['name'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <!-- 仕事内容 -->
        <div class="playTextboxWrap">
          <input id="work" class="textInput playTextboxWork" type="text" name="work" value="<?php echo !empty($_POST['work']) ? htmlspecialchars_decode($_POST['work'],ENT_NOQUOTES) : ''; ?>">
          <label class="playLabelWork" for="work">仕事内容</label>            
          <span class="errorMsg">
            <?php echo !empty($errorMsg['work']) ? $errorMsg['work'] : ''; ?>
          </span>
        </div>

        <!-- 稼働日 -->
        <div class="playTextboxWrap">
          <div id="selectItem">
            <select class="textInput" name="workingDateYear">
              <option value="<?php echo date('Y') ?>" selected>
                <?php echo date('Y') ?>
              </option>
            </select>年
            <select class="textInput" name="workingDateMonth">
              <?php for($i = 1; $i <= 12; $i++){ ?>
                <?php if(date('n') == $i) { ?>
                  <option value="<?php echo $i ?>" selected>
                    <?php echo $i ?>
                  </option>
                <?php } ?>
                <option value="<?php echo $i ?>">
                  <?php echo $i ?>
                </option>
              <?php } ?>
            </select>月
            <select class="textInput" name="workingDateDay">
              <?php for($i = 1; $i <= 31; $i++){ ?>
                <?php if(date('j') == $i) { ?>
                  <option value="<?php echo $i ?>" selected>
                    <?php echo $i ?>
                  </option>
                <?php } ?>
                <option value="<?php echo $i ?>">
                  <?php echo $i ?>
                </option>
              <?php } ?>
            </select>日
          </div>
        </div>

        <!-- 給与 -->
        <div class="playTextboxWrap">
          <input id="salary" class="textInput playTextboxSalary" type="text" name="salary" value="<?php echo !empty($_POST['salary']) ? htmlspecialchars_decode($_POST['salary'],ENT_NOQUOTES) : ''; ?>">
          <label class="playLabelSalary" for="salary">給与</label>            
          <span class="errorMsg">
            <?php echo !empty($errorMsg['salary']) ? $errorMsg['salary'] : '';?>
          </span>
        </div>

        <input class="btn" type="submit" value="確認">
      </form>
    </main>

    <!-- JSファイル読み込み -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="/js/main.js"></script>
  </body>
</html>
