<?php

namespace App\Service;

use App\Entity\Algorithm;
use LLPhant\OpenAIConfig;
use LLPhant\Chat\OpenAIChat;
use App\Form\Model\AlgorithmModel;
use LLPhant\Chat\Enums\OpenAIChatModel;
use LLPhant\Chat\FunctionInfo\FunctionBuilder;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

class OpenAiChatService
{

    public function __construct
    (
        #[Autowire('%open_ai_api_key%')] private readonly string $openAiApiKey,
        private readonly AlgorithmService $algorithmService,
    ){ }

    public function createAlgorithm(AlgorithmModel $model): void
    {
        $chat = $this->openAiChat();
        $tool = FunctionBuilder::buildFunctionInfo($this->algorithmService, 'createAlgorithm');
        $chat->addTool($tool);
        $chat->setSystemMessage("Vous êtes un assistant IA serviable.Lorsque vous disposez de suffisament d'informations, vous pouvez créer un sujet d'algorithme en fournissant un titre, une signature, un type de retour et un exemple.");
        $chat->generateText(
            sprintf("Créer un sujet d'Algorithme ayant comme thème : %s, et un niveau de difficulté %s,
            
                $model->theme,
                $model->level,
            ")
        );
    }

    private function openAiChat(): OpenAIChat
    {
        $config = new OpenAIConfig();
        $config->model = OpenAIChatModel::Gpt35Turbo->name;
        // dd(OpenAIChatModel::Gpt35Turbo->name);

        return new OpenAIChat($config);
    }

}