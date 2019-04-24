<div class="container">
    <table class="bordered striped centered highlight responsive-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Usuario</th>
                    <th>Email</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Id</td>
                    <td>Nome</td>
                    <td>Usuario</td>
                    <td>Email</td>
                    <td>
                      <button class='btn btn-warning' type='button'  >Editar <span class='glyphicon glyphicon-pencil'></span></button></a>
                      <button class='btn btn-danger ' type='button'  id='excluir' onclick='testeBT()'>Excluir <span class='glyphicon glyphicon-trash'></button></a>
                      <button class='btn btn-info ' type='button'  data-toggle='modal' data-target='#info<?=$row["id"]?>'> <span class='glyphicon glyphicon-info-sign'></button>
                    </td>
                </tr>
            </tbody>        
        </table>   
</div>
