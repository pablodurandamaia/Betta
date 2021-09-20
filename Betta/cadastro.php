<?php
include 'menu.php';
include_once(dirname(__FILE__) . "/admin/functions/cadastro.usuario.php");
?>

<!-- imagem do inicio-->
    <div class="container">
        <div class="row">
            <div class="imagem-top">
                <img class="img-fluid" src="assets/imgs/desconto.png" alt="">
            </div>
        </div>
    </div>

    <!-- formulario para receber as informaçoes nele digitadas e enviar para a funçao-->
    <form method="POST">

        <section class="cad">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>Nome</label>
                    <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome" required>
                </div>
            </div>

            <!-- 1 -->

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                </div>

                <div class="form-group col-md-6">
                    <label>Senha</label>
                    <input type="password" name="senha" class="form-control" id="senha" placeholder="Senha" required>
                </div>
            </div>

            <!-- 2 -->

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Rua</label>
                    <input type="rua" name="rua" class="form-control" id="rua" placeholder="Rua" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Número</label>
                    <input type="number" name="numero" class="form-control" id="number" placeholder="Nº" required>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>CEP</label>
                    <input type="cep" name="cep" class="form-control" id="cep" placeholder="00000-000" required>
                </div>
            </div>
                
                <!-- 3 -->

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Telefone</label>
                        <input type="text" class="form-control" placeholder="Telefone" id="telefone" name="telefone" required><br>
                    </div>

            <!-- 4 -->

                    <div class="form-group col-md-6">
                        <label>Bairro</label>
                        <select name="bairro" id="bairro" class="form-control" required>
                            <option selected>Escolher...</option>
                            <option value="Adhemar Garcia">Adhemar Garcia</option>
                            <option value="América">América</option>
                            <option value="Anita Garibaldi">Anita Garibaldi</option>
                            <option value="Atiradores">Atiradores</option>
                            <option value="Aventureiro">Aventureiro</option>
                            <option value="Boa Vista">Boa Vista</option>
                            <option value="Boehmerwald">Boehmerwald</option>
                            <option value="Bom Retiro">Bom Retiro</option>
                            <option value="Bucarein">Bucarein</option>
                            <option value="Centro">Centro</option>
                            <option value="Comasa">Comasa</option>
                            <option value="Costa e Silva">Costa e Silva</option>
                            <option value="Espinheiros">Espinheiros</option>
                            <option value="Fátima">Fátima</option>
                            <option value="Floresta">Floresta</option>
                            <option value="Glória">Glória</option>
                            <option value="Guanabara">Guanabara</option>
                            <option value="Iririú">Iririú</option>
                            <option value="Itaum">Itaum</option>
                            <option value="Itinga">Itinga</option>
                            <option value="Parque Guarani">Parque Guarani</option>
                            <option value="Jardim Iririú">Jardim Iririú</option>
                            <option value="Jardim Paraíso">Jardim Paraíso</option>
                            <option value="Jardim Sophia">Jardim Sophia</option>
                            <option value="Jarivatuba">Jarivatuba</option>
                            <option value="Jativoca">Jativoca</option>
                            <option value="João Costa">João Costa</option>
                            <option value="Morro do Meio">Morro do Meio</option>
                            <option value="Nova Brasília">Nova Brasília</option>
                            <option value="Paranaguamirim">Paranaguamirim</option>
                            <option value="Petrópolis">Petrópolis</option>
                            <option value="Pirabeiraba">Pirabeiraba</option>
                            <option value="Profipo">Profipo</option>
                            <option value="Saguaçu">Saguaçu</option>
                            <option value="Santa Catarina">Santa Catarina</option>
                            <option value="Santo Antônio">Santo Antônio</option>
                            <option value="São Marcos">São Marcos</option>
                            <option value="Ulysses Guimarães">Ulysses Guimarães</option>
                            <option value="Vila Cubatão">Vila Cubatão</option>
                            <option value="Vila Nova">Vila Nova</option>
                            <option value="Zona Industrial Norte">Zona Industrial Norte</option>
                            <option value="Zona Industrial Tupy">Zona Industrial Tupy</option>
                        </select>
                    </div>
                </div>
                <!-- 5 -->
                <input type="submit" name="cadastrar" id="cadastrar" class="btn btn-warning" value="Cadastrar"></input>
        </section>
    </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <script type="text/javascript">
        $("#telefone").mask("(00) 0 0000-0000");
        $("#cep").mask("00000-000");
    </script>
</body>

</html>