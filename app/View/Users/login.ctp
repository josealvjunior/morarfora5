<h2><?php echo __('Login'); ?></h2>
    <?php echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'login')));?>
        <fieldset>
        <?php
            echo $this->Form->input('email');
            echo $this->Form->input('senha');
        ?>
        </fieldset>
    <?php echo $this->Form->end('Submit');?>