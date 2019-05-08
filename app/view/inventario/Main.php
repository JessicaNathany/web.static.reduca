<?php
#<!--VIEW @Clientes -->
use App\Model\ClassInventario;
$data = new ClassInventario();
?>
<div class="container">
    <h1 style='font-weight:bold;'>Inventário</h1>
    <hr>
<div class="col-sm-2">
  <div class="card">
    <h3 class="title">Especies</h3>
    <div class="bar">
      <div class="emptybar"></div>
      <div class="filledbar">          
      </div>
    </div>
    <div class="circle">
      <h1><?=$data->getInventario()["especie"]?></h1>
    </div>
  </div>
</div> 
<div class="col-sm-2">
  <div class="card">
    <h3 class="title">Germinações</h3>
    <div class="bar">
      <div class="emptybar"></div>
      <div class="filledbar">       
      </div>
      <h1></h1>      
    </div>
    <div class="circle">
      <h1><?=$data->getInventario()["geminacao"]?></h1>
    </div>
  </div>
</div> 
<div class="col-sm-2">
  <div class="card">
    <h3 class="title">Repicagens</h3>
    <div class="bar">
      <div class="emptybar"></div>
      <div class="filledbar"></div>      
    </div>
    <div class="circle">        
    <h1><?=$data->getInventario()["repicagem"]?></h1>
    </div>
  </div>
</div> 
<div class="col-sm-2">
  <div class="card">
    <h3 class="title" style="color:red;">Perdas</h3>
    <div class="bar">
      <div class="emptybar"></div>
      <div class="filledbar"></div>
    </div>
    <div class="circle">
      <h1><?=$data->getInventario()["descartes"]?></h1>
    </div>
  </div>
</div> 
<div class="col-sm-2">
  <div class="card">
    <h3 class="title">Semente que + Germinou</h3>
    <div class="bar">
      <div class="emptybar"></div>
      <div class="filledbar"></div>
    </div>
    <div class="circle">
      <?=$data->getMaxQtde("tb_geminacao")["especie"]?>
        <h1><?=$data->getMaxQtde("tb_geminacao")["qtde"]?></h1>
    </div>
  </div>
</div> 
<div class="col-sm-2">
  <div class="card">
    <h3 class="title">Semente que - Germinou</h3>
    <div class="bar">
      <div class="emptybar"></div>
      <div class="filledbar"></div>
    </div>
    <div class="circle">
      <?=$data->getMinQtde("tb_geminacao")["especie"]?>
        <h1><?=$data->getMinQtde("tb_geminacao")["qtde"]?></h1>    
    </div>
  </div>
</div> 
<div class="col-sm-2">
  <div class="card">
    <h3 class="title">Muda + Repicada</h3>
    <div class="bar">
      <div class="emptybar"></div>
      <div class="filledbar"></div>
    </div>
    <div class="circle">
      <?=$data->getMaxQtde("tb_repicagem")["especie"]?>
        <h1><?=$data->getMaxQtde("tb_repicagem")["qtde"]?></h1> 
    
    </div>
  </div>
</div> 
<div class="col-sm-2">
  <div class="card">
    <h3 class="title">Muda - Repicada</h3>
    <div class="bar">
      <div class="emptybar"></div>
      <div class="filledbar"></div>
    </div>
    <div class="circle">
      <?=$data->getMinQtde("tb_repicagem")["especie"]?>
        <h1><?=$data->getMinQtde("tb_repicagem")["qtde"]?></h1> 
    
    </div>
  </div>
</div> 
<div class="col-sm-2">
  <div class="card">
    <h3 class="title">Espécie + descartada</h3>
    <div class="bar">
      <div class="emptybar"></div>
      <div class="filledbar"></div>
    </div>
    <div class="circle">
      <?=$data->getMaxQtde("tb_descartes")["especie"]?>
        <h1><?=$data->getMaxQtde("tb_descartes")["qtde"]?></h1>    
    </div>
  </div>
</div> 
<div class="col-sm-2">
  <div class="card">
    <h3 class="title">Espécie - descartada</h3>
    <div class="bar">
      <div class="emptybar"></div>
      <div class="filledbar"></div>
    </div>
    <div class="circle">
      <?=$data->getMinQtde("tb_descartes")["especie"]?>
        <h1><?=$data->getMinQtde("tb_descartes")["qtde"]?></h1>    
    </div>
  </div>
</div> 
<div class="col-sm-2">
  <div class="card">
    <h3 class="title">Espécie + doada</h3>
    <div class="bar">
      <div class="emptybar"></div>
      <div class="filledbar"></div>
    </div>
    <div class="circle">
      
    
    </div>
  </div>
</div> 
<div class="col-sm-2">
  <div class="card">
    <h3 class="title"></h3>
    <div class="bar">
      <div class="emptybar"></div>
      <div class="filledbar"></div>
    </div>
    <div class="circle">
      
    
    </div>
  </div>
</div> 
    
</div>
