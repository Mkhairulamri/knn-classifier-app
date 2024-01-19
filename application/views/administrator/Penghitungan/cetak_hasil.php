<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{{$title.xls}}</title>

        <style>
            body {
                font-family: "Bookman Old Style";
            }
            #title {
                font-weight: "bold";
            }
			.border{
				border: 1px solid;
				border-width:thin;
			}
        </style>
    </head>
    <body>
        <?php

		header("Content-type: application/octet-stream");

		header("Content-Disposition: attachment; filename=$title.xls");

		header("Pragma: no-cache");

		header("Expires: 0");

		?>
        <center>
            <h3>
                REKAP DATA BATITA<br />
                PADA UPT PUSKESMAS BENGKALIS  <?php $besar = strtoupper($d); echo $besar;?>TAHUN 2023<br />
            </h3>
        </center>
        <br />
        <!--<table border="0" style="font-family: 'Bookman Old Style'; font-weigh: bold;" id="title">-->
        <!--    <tr>-->
        <!--        <td colspan="2">Provinsi</td>-->
        <!--        <td>: Riau</td>-->
        <!--    </tr>-->
        <!--    <tr>-->
        <!--        <td colspan="2">Kab / Kota</td>-->
        <!--        <td>: Bengkalis</td>-->
        <!--    </tr>-->
        <!--    <tr>-->
        <!--        <td colspan="2">Bidang</td>-->
        <!--        <td>: Pendidikan</td>-->
        <!--    </tr>-->
        <!--    <tr>-->
        <!--        <td colspan="2">Unit Organisasi</td>-->
        <!--        <td style="color: red;" colspan="2">: SMK NEGERI 1 BENGKALIS</td>-->
        <!--    </tr>-->
        <!--    <tr>-->
        <!--        <td colspan="2">Kode Lokasi</td>-->
        <!--        <td colspan="4">: JL. PRAMUKA AIR PUTIH - KEC.BENGKALIS - KAB.BENGKALIS</td>-->
        <!--    </tr>-->
        <!--</table>-->

		<table border="0" width="100%" class="col">
			<thead>
				<tr>
					<th scope="col" class="border" colspan="2">NO</th>
					<th scope="col" class="border" colspan="2">NAMA</th>
					<th scope="col" class="border" colspan="2">TANGGAL LAHIR</th>
					<th scope="col" class="border" colspan="2">JENIS KELAMIN</th>
					<th scope="col" class="border" colspan="2">BERAT BADAN</th>
					<th scope="col" class="border" colspan="2">TINGGI BADAN</th>
					<th scope="col" class="border" colspan="2">USIA</th>
					<th scope="col" class="border" colspan="2">JARAK</th>
					<th scope="col" class="border" colspan="3">KLASIFIKASI</th>

				</tr>
				<tr>
					<th class="border" colspan="2">1</th>
					<th class="border" colspan="2">2</th>
					<th class="border" colspan="2">3</th>
					<th class="border" colspan="2">4</th>
					<th class="border" colspan="2">5</th>
					<th class="border" colspan="2">6</th>
					<th class="border" colspan="2">7</th>
					<th class="border" colspan="2">8</th>
					<th class="border" colspan="3">9</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no     = 1;
				$jumlah = 0;
				$unit = 0;
				foreach ($klasifikasi as $jrs) {
				?>
				<tr>
					<td class="border" style="background-color: #00b050;" colspan="2"></td>
					<td class="border" style="background-color: #00b050;" colspan="2"></td>
					<td class="border" style="background-color: #00b050;" colspan="2"></td>
					<td class="border" style="background-color: #00b050;" colspan="2"></td>
					<td class="border" style="background-color: #00b050;" colspan="2"></td>
					<td class="border" style="background-color: #00b050;" colspan="2"></td>
					<td class="border" style="background-color: #00b050;" colspan="2"></td>
					<td class="border" style="background-color: #00b050;" colspan="2"></td>
					<td class="border" style="background-color: #00b050;" colspan="3"></td>
				</tr>
				<tr>
					<td class="border" colspan="2">
						<?php
							echo $no++;
						?>
					</td>
					<td class="border" colspan="2">
						<?php
						echo $jrs->nama; ?>
					</td>
					<td class="border" colspan="2">
						<?php
						echo $jrs->tanggal_lahir; ?>
					</td>
					<td class="border" colspan="2">
						<?php
						echo $jrs->jenis_kelamin; ?>
					</td>
					<td class="border" colspan="2" >
						<?php
						echo $jrs->berat; ?>
					</td>
					<td class="border" colspan="2">
						<?php
						echo $jrs->tinggi; ?>
					</td>
					<td class="border" colspan="2">
						<?php
						echo $jrs->usia_diagnosa; ?>
					</td>
                    <td class="border" colspan="2">
						<?php
						echo $jrs->jarak; ?>
					</td>
                    <td class="border" colspan="3">
						<?php
						echo $jrs->diagnosa; ?>
					</td>
				
				</tr>
				<?php } ?>
				<tr>
					<td class="border" style="background-color: #00b050;" colspan="2"></td>
					<td class="border" style="background-color: #00b050;" colspan="2"></td>
					<td class="border" style="background-color: #00b050;" colspan="2"></td>
					<td class="border" style="background-color: #00b050;" colspan="2"></td>
					<td class="border" style="background-color: #00b050;" colspan="2"></td>
					<td class="border" style="background-color: #00b050;" colspan="2"></td>
					<td class="border" style="background-color: #00b050;" colspan="2"></td>
					<td class="border" style="background-color: #00b050;" colspan="2"></td>
					<td class="border" style="background-color: #00b050;" colspan="3"></td>

				</tr>
			</tbody>
			<tfoot>
			
			</tfoot>
		</table>
			

        <br style="margin-top: 20px;" />
        <table border="0" width="100%">
            <tbody>
                <tr>
                    <th style="text-align: center;" colspan="3">Mengetahui</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th style="text-align: center;" colspan="3">
                        Bengkalis,
                        <?php
				$tanggal = date('Y-m-d');
				$bulan = array(
					1 =>
                        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember' ); $split = explode('-', $tanggal); echo $split[2] . ' ' . $bulan[(int) $split[1]] . ' ' .
                        $split[0]; ?>
                    </th>
                </tr>
                <tr>
                    <th style="text-align: center;" colspan="3">KEPALA UPT PUSKESMAS BENGKALIS</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th style="text-align: center;" colspan="3">BIDANG GIZI</th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <th style="text-align: center; font-style: bold; text-decoration: underline;" colspan="3">...........</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th colspan="3" style="text-align: center; font-style: bold; text-decoration: underline;">...........</th>
                </tr>
                <tr>
                    <th colspan="3">NIP. ...............</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th colspan="3">NIP. ...............</th>
                </tr>
            </tbody>
        </table>
    </body>
</html>
