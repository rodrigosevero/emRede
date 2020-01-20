{**
 * templates/frontend/components/footer.tpl
 *
 * Copyright (c) 2014-2019 Simon Fraser University
 * Copyright (c) 2003-2019 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @brief Common site frontend footer.
 *
 * @uses $isFullWidth bool Should this page be displayed without sidebars? This
 *       represents a page-level override, and doesn't indicate whether or not
 *       sidebars have been configured for thesite.
 *}

	</div><!-- pkp_structure_main -->

	{* Sidebars *}
	{if empty($isFullWidth)}
		{capture assign="sidebarCode"}{call_hook name="Templates::Common::Sidebar"}{/capture}
		{if $sidebarCode}
			<div class="pkp_structure_sidebar left" role="complementary" aria-label="{translate|escape key="common.navigation.sidebar"}">
				{$sidebarCode}
			</div><!-- pkp_sidebar.left -->
		{/if}
	{/if}
</div><!-- pkp_structure_content -->

<div id="pkp_content_footer" class="pkp_structure_footer_wrapper" role="contentinfo">
<footer>
        <div class="footer-text">
            <p>EmRede - Revista de Educação a Distância, Porto Alegre, RS, Brasil</p>
            <p> ISSN: 2359-6082 </p>
             <div class="footer-text">
                <p>Licença Creative Commons - Atribuição-Não Comercial-Sem Derivações 4.0 Internacional.</p>
                <img src="{$baseUrl}/templates/images/88x31.png">
            </div>
        </div>
       <a href="https://aunirede.org.br">
        <img alt="{translate key="about.aboutThisPublishingSystem"}" src="{$baseUrl}/templates/images/ojs_unirede_preto.svg">
        </a>
        
    </footer>

</div><!-- pkp_structure_footer_wrapper -->

</div><!-- pkp_structure_page -->

{load_script context="frontend"}
<script type="text/javascript">
let mainNav = document.getElementById("navigationPrimary");
let navBarToggle = document.getElementById("navbar-toggle");

navBarToggle.addEventListener("click", function() {
    mainNav.classList.toggle("active");
});

</script>

{call_hook name="Templates::Common::Footer::PageFooter"}
</body>
</html>
