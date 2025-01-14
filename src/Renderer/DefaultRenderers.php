<?php

declare(strict_types=1);

namespace Odiseo\SyliusReportPlugin\Renderer;

/**
 * Default renderers.
 *
 * @author Mateusz Zalewski <mateusz.zalewski@lakion.com>
 * @author Diego D'amico <diego@odiseo.com.ar>
 */
final class DefaultRenderers
{
    /**
     * Table renderer
     */
    public const TABLE = 'odiseo_sylius_report_plugin_renderer_table';

    /**
     * Chart renderer
     */
    public const CHART = 'odiseo_sylius_report_renderer_chart';
}
