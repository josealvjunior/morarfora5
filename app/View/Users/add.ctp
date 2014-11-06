 <?php echo $this->Form->create('User');?>
        <fieldset>
        <?php
            echo $this->Form->input('email');
            echo $this->Form->input('senha', array('value' => ''));          
        ?>
        </fieldset>
    <?php echo $this->Form->end('Submit');?>