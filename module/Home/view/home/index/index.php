<div class="row" style="padding-bottom: 10px">
    <div class="col">
        <h2>A Multipurpose Discord Bot</h2>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <iframe src="https://discordapp.com/widget?id=433475261661577227&theme=dark"
                style="width: 100%; height: 100%; padding-bottom: 10px;" allowtransparency="true"
                frameborder="0"></iframe>
    </div>
    <div class="col-sm">
        <div class="message">
            <div class="message-header">Getting Started</div>
            <div class="message-body">
                <p>To get started, select the bot instance to login with discord and choose the guild you would like
                    to setup.</p>
                <?php
                /** @var \Zend\Form\Form $form */
                $form = $this->indexForm;
                $form->setAttributes([
                    'action' => $this->url('login'),
                    'method' => 'post'
                ]);
                $form->prepare();

                echo $this->form()->openTag($form);
                ?>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="clientId">Bot Name</label>
                    </div>
                    <?= $this->formRow($form->get('clientId')) ?>
                </div>
                <?= $this->formRow($form->get('login')) ?>
                <?= $this->formRow($form->get('action')) ?>
                <?= $this->formRow($form->get('loginCsrf')) ?>
                <?= $this->form()->closeTag() ?>
            </div>
        </div>
        <div class="message">
            <div class="message-header">Features</div>
            <div class="message-body">
                <p>Free Game Notification - It will notify users about any potential free game that you can grab before
                    the promotion expires. (Offers are usually from humble bundle, gog or directly from steam)</p>
                <p>Custom Vanity Links - Provides a custom vanity link that user can join your server with. (Anti
                    Raiding + Custom Rate Limiting)</p>
            </div>
        </div>
    </div>
</div>