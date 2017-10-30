<?php 
                        $totalEarnings = '0';
                        if(!empty($paymentHistories) && $paymentHistories[0]['id'] != ""): foreach($paymentHistories as $data): ?>
                                 <?php $totalEarnings = $totalEarnings + $data['business_amount'] ?>
                                <tr class="odd gradeX">
                                    <td><?= $data['charge_id'] ?></td>
                                    <td><?= $data['created_at'] ?></td>
                                    <td><?= $data['user'] ?> </td>
                                    <td><?= $data['business'] ?> </td>
                                    <td>£<?= number_format($data['amount'],2) ?> </td>
                                    <td>£<?= number_format(($data['admin_amount'] + $data['stripe_amount']),2) ?> </td>
                                    <td>£<?= number_format($data['business_amount'],2) ?> </td>
                                </tr>

                        <?php endforeach; else: ?>
                                <tr><td colspan="7" class="text-center"><b>Payment histories not available.</b></td></tr>
                        <?php endif; ?>
                                <tr>
                                    <td colspan="6"><p class="text-right"><b>Total Earnings:</b></p></td>
                                    <td><b>£<?= number_format($totalEarnings,2) ?></b></td>
                                </tr>        
                        <tr class="odd gradeX">
                            <td colspan="7">
                                <?php echo $this->ajax_pagination->create_links(); ?>
                            </td>
                        </tr>