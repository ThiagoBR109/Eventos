<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./home.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>EventPro Solution</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css">
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <link rel="icon" href="./img/favicon.png">
</head>
<body>
    
    <header>
        <img src="./img/logo.png" alt="Logo" class="logo">
        <nav>
            <ul>
                <li>
                    <a href="galeria.html" target="_blank" class="btn btn-primary">Galeria de fotos</a>
                </li>
                <?php if (isset($_SESSION['usuario_logado'])): ?>
                <li>
                    <a href="Agendamento/Controller/logout.php" class="btn btn-danger">Sair</a>
                </li>
                <?php else: ?>
                <li>
                    <a href="login.html" class="btn btn-primary">Login/Cadastro</a>
                </li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    
    <section class="serviços">
        <h2>Nossos Serviços</h2>
        <p>Aqui você pode destacar os principais serviços que sua empresa oferece para gerenciamento de eventos.</p>
        <ul>
            <li>Serviço de planejamento e organização de eventos corporativos</li>
            <li>Gestão de logística e fornecedores</li>
            <li>Consultoria para eventos sociais e casamentos</li>
            <li>Outros serviços personalizados de acordo com as necessidades dos clientes</li>
        </ul>
    </section>
    
    <section class="depoimentos">
        <h2>Depoimentos</h2>
        <div class="testimonial">
            <p>"A EventPro Solutions tornou nossos eventos japoneses ainda mais imersivos e memoráveis. Serviço excepcional!"</p>
            <p>- RisingSun Events</p>
        </div>
        <div class="testimonial">
            <p>"Com a EventPro Solutions, nossos eventos musicais alcançaram novos patamares de excelência. Profissionalismo exemplar!"</p>
            <p>- MelodyMix Productions</p>
        </div>
        <div class="testimonial">
            <p>"A EventPro Solutions nos forneceu soluções estratégicas precisas para o sucesso empresarial. Uma parceria indispensável!"</p>
            <p>- FocusEdge Solutions</p>
        </div>
    </section>
    
    <section class="proximos-eventos">
        <table class="table table-striped" id="myTable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Local</th>
                    <th scope="col">Data</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Energize Events</td>
                    <td>Centro de Convenções</td>
                    <td>15 de julho</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Aurora Productions</td>
                    <td>Hotel Lux</td>
                    <td>28 de agosto</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Momentum Entertainment</td>
                    <td>Espaço Cultural</td>
                    <td>10 de setembro</td>
                </tr>
            </tbody>
        </table>
        <a href="./Agendamento/index.php" class="btn btn-primary">Agende seu evento</a>
    </section>
        
    <script src="./js/datatable.js"></script>

    <footer>
        <div class="container">
            <h5>Contate-nos</h5>
            <ul class="contact-info">
                <li>E-mail: contato@eventprosolution.com</li>
                <li>Telefone: (21) 9876-5432</li>
                <li>Instagram: @eventprosolution</li>
                <li><a href="https://www.linkedin.com/in/thiago-macieira-061348273/" style="color: rgb(255, 255, 255);" target="_blank">Desenvolvido por <span style="color: rgb(25, 0, 255);">Thiago Macieira</span></a></li>
            </ul>
        </div>
    </footer>
    <script>
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('login') && urlParams.get('login') === 'success') {
            alert('Login realizado com sucesso!');
        }
        if (urlParams.has('logout') && urlParams.get('logout') === 'success') {
            alert('Logout realizado com sucesso!');
            }
    </script>

</body>
</html>
