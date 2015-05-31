<?php if (!empty($services)): ?>
    <ul class="contains-cookie-policy-services">
        <?php foreach ($services as $service): ?>
            <li>
                <h5><?php echo $service['name'] ?></h5>
                
                <?php if (!empty($service['description'])): ?>
                    <p><?php echo $service['description'] ?></p>
                <?php endif; ?>
                
                <?php if (!empty($service['urls'])): ?>
                    <ul>
                        <?php foreach ($service['urls'] as $url): ?>
                            <li><a href="<?php echo $url ?>" target="_blank"><?php echo $url ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>