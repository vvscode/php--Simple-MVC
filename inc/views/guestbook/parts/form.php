<form class="form-horizontal" method="post">
    <fieldset>

        <!-- Form Name -->
        <legend>Оставьте ваше сообщение</legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="userName">Имя</label>
            <div class="col-md-4">
                <input id="userName" name="userName" type="text" placeholder="Представьтесь" class="form-control input-md" required="" value="<?= @$this->gbUserName ?>">
            </div>
            <p class="help-block" data-name="userName"></p>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="userEmail">Email</label>
            <div class="col-md-4">
                <input id="userEmail" name="userEmail" type="email" placeholder="Оставьте ваш e-mail" class="form-control input-md" required="" value="<?= @$this->gbUserEmail ?>">
            </div>
            <p class="help-block" data-name="userEmail"></p>
        </div>

        <!-- Textarea -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="messageText">Сообщение</label>
            <div class="col-md-4">
                <textarea class="form-control" id="messageText" name="messageText" placeholder="Введите ваше сообщение"><?= @$this->gbMessage ?></textarea>
            </div>
            <p class="help-block" data-name="messageText"></p>
        </div>

        <!-- Prepended text-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="captcha">Защита от роботов</label>
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-addon"><?= @$this->gbCaptchaQuestion ?> =</span>
                    <input id="captcha" name="captcha" class="form-control" placeholder="Введите ответ" type="text" required="">
                </div>
                <p class="help-block" data-name="captcha"></p>
            </div>
        </div>

        <!-- Button (Double) -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="resetBtn"></label>
            <div class="col-md-8">
                <button id="resetBtn" name="resetBtn" type="reset" class="btn btn-inverse">Сбросить</button>
                <button id="sendBtn" name="sendBtn" type="submit" class="btn btn-success">Отправить</button>
            </div>
        </div>

    </fieldset>
</form>