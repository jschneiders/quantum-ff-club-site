<?php

  $conteudo = '<section class="contato">
                  <h2>Contato</h2>
                  <p>Para falar conosco, envie um email para
                      <a href="mailto:contato@quantumfirefox.club">contato@quantumfirefox.club</a>
                      ou utilize o formulário.</p>
                </section>
                <section class="contato">
                  <form name="contato" method="post" action="">
                    <input type="text" name="nome" placeholder="nome" />
                    <input type="email" name="email" placeholder="email" />
                    <textarea></textarea>
                    <button type="submit" value="enviar">enviar</button>
                  </form>
                </section>';

    echo $conteudo;

    return;

?>
