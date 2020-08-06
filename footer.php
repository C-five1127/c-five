
<br>
<br>
<br>

<footer>

  <?php
  if (strcmp(content, "contact") != 0) {
    echo <<<EOM
    <div class='contact'>
      <div class='contact_information'>
        <h2>CONTACT</h2>
        <p>お問い合わせ</p>

        <div class='gradient'>
          <label onclick="location.href='./contact.php'">CONTACT   →</label>
        </div>

      </div>
    </div>
    EOM;
  }
  ?>

<br>
<br>
<br>

  <div class="l-flex">

    <div class="logo">
      <a href="./"><img src="img/logo/C-Five_logo.png"></a>
    </div>

    <table>
        <tr>
              <td>
                <a href="./">TOP</a>
              </td>
            <td>
              <a href="service.php">事業内容</a>
            </td>
            <td>
                <a href="group.php">グループ企業</a>
            </td>
        </tr>
        <tr>
            <td>
                <a href="company.php">会社情報</a>
            </td>
            <td>
                <a href="service.php#prime-system-development">- プライムシステムサービス</a>
            </td>
            <td>
              <a href="https://www.c-oac.com">- 株式会社OACホールディングス</a>
            </td>
        </tr>
        <tr>
            <td>
                <a href="message.php">- 代表挨拶</a>
            </td>
            <td>
                <a href="service.php#it-promote">- ITプロモートサービス</a>
            </td>
            <td>
                <a href="https://www.c-tos.com">- 株式会社シートス</a>
            </td>
        </tr>
        <tr>
            <td>
                <a href="aboutus.php">- 会社概要</a>
            </td>
            <td>
                <a href="service.php#smartphone-web">- スマホウェブサービス</a>
            </td>
            <td>
              <a href="recruit.php">採用情報</a>
            </td>
        </tr>
        <tr>
            <td>
                <a href="group.php">- グループ企業</a>
            </td>
            <td>
                <a href="service.php#content-planning-prodution">- コンテンツ企画・制作</a>
            </td>
            <td>
                <a href="contact.php">お問い合わせ</a>
            </td>
        </tr>
      </table>
    </div>

  <div>

      <hr>

      <div class="policy l-flex">
        <a href="privacy.php">プライバシーポリシー</a>
        <a href="security.php">情報セキュリティ基本方針</a>
      </div>

      <p class="copyright">
        <small class="copyright-text">copyright&#169; 2019  C-ﬁve.,Ltd all rights reserved.</small>
      </p>

    </footer>

  </div>

</body>
</html>
