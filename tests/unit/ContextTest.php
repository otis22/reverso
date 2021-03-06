<?php

declare(strict_types=1);

namespace Otis22\Reverso;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class ContextTest extends TestCase
{
    private string $ruToEngTranslateWordPrimerResponse = <<<EOD
{"list":[{"s_text":"Красивый <em>пример</em> - прошлогодняя эпидемия свиного гриппа.","t_text":"So a nice <em>example</em> of this came from last year and swine flu.","ref":"FLEEX.EN-RU_149658","cname":"FLEEX.EN-RU","url":"https://context.reverso.net","ctags":"general","pba":false},{"s_text":"Данный <em>пример</em> покажет основные прицепы нововведений.","t_text":"This <em>example</em> will show the main principles of the new features.","ref":"COMMONCRAWL.EN-RU_7227","cname":"COMMONCRAWL.EN-RU","url":"http://www.statmt.org/wmt13/","ctags":"general","pba":false},{"s_text":"Это наиболее значимый <em>пример</em> реструктуризации существующих институтов.","t_text":"This is the most relevant <em>case</em> of the current restructuring of an institution.","ref":"MULTIUN-V1.EN-RU_10206690","cname":"MULTIUN-V1.EN-RU","url":"https://conferences.unite.un.org/UNCorpus","ctags":"general","pba":false},{"s_text":"Этот <em>пример</em> вновь продемонстрировал способность Трибунала разрешать споры без неоправданных задержек или расходов.","t_text":"This <em>case</em> has once again demonstrated the Tribunal's ability to bring about dispute settlement without unnecessary delay or expense.","ref":"MULTIUN.EN-RU_1465297","cname":"MULTIUN.EN-RU","url":"http://opus.nlpl.eu/MultiUN.php","ctags":"general","pba":false},{"s_text":"Посмотрите на <em>пример</em> на двадцатой странице.","t_text":"But now look at the next <em>example</em> question on page 20.","ref":"OPENSUBTITLES-2016.EN-RU_6989704","cname":"OPENSUBTITLES-2016.EN-RU","url":"http://opus.nlpl.eu/OpenSubtitles2016.php","ctags":"general","pba":false},{"s_text":"Положительный <em>пример</em> решения этой проблемы дает Испания.","t_text":"A positive <em>example</em> on how to address this can be found in Spain.","ref":"MULTIUN-V1.EN-RU_14379471","cname":"MULTIUN-V1.EN-RU","url":"https://conferences.unite.un.org/UNCorpus","ctags":"general","pba":false},{"s_text":"Вот простой <em>пример</em> установки собственного события.","t_text":"Here is a simple <em>example</em> of how to setup a custom event.","ref":"COMMONCRAWL.EN-RU_637437","cname":"COMMONCRAWL.EN-RU","url":"http://www.statmt.org/wmt13/","ctags":"general","pba":false},{"s_text":"Это совсем свежий <em>пример</em> присвоения чужой интеллектуальной собственности.","t_text":"It's an absolutely fresh <em>example</em> of assignment of the another's intellectual property in Russia.","ref":"COMMONCRAWL.EN-RU_626009","cname":"COMMONCRAWL.EN-RU","url":"http://www.statmt.org/wmt13/","ctags":"general","pba":false},{"s_text":"Мы, правительства, должны уметь руководить, подавая <em>пример</em>.","t_text":"We, the Governments, must be able to lead by <em>example</em>.","ref":"MULTIUN-V1.EN-RU_1370960","cname":"MULTIUN-V1.EN-RU","url":"https://conferences.unite.un.org/UNCorpus","ctags":"general","pba":false},{"s_text":"Мне нужно дать этим детям лучший <em>пример</em>.","t_text":"I need to give those kids a better <em>example</em>.","ref":"OPENSUBTITLES-2016.EN-RU_10528516","cname":"OPENSUBTITLES-2016.EN-RU","url":"http://opus.nlpl.eu/OpenSubtitles2016.php","ctags":"general","pba":false},{"s_text":"Третий <em>пример</em> - это передача знаний и технологий.","t_text":"The third <em>example</em> is the transfer of knowledge and technology.","ref":"MULTIUN.EN-RU_1311372","cname":"MULTIUN.EN-RU","url":"http://opus.nlpl.eu/MultiUN.php","ctags":"general","pba":false},{"s_text":"В соответствии с этим предложением ИСМДП подготовил такой <em>пример</em> оптимальной практики.","t_text":"Following this invitation, the TIRExB has prepared such <em>example</em> of best practice.","ref":"MULTIUN.EN-RU_824128","cname":"MULTIUN.EN-RU","url":"http://opus.nlpl.eu/MultiUN.php","ctags":"general","pba":false},{"s_text":"Самый сложный <em>пример</em> этого - Ближний Восток.","t_text":"The most complex <em>example</em> of this is in the Middle East.","ref":"MULTIUN.EN-RU_814853","cname":"MULTIUN.EN-RU","url":"http://opus.nlpl.eu/MultiUN.php","ctags":"general","pba":false},{"s_text":"Наиболее показательным является <em>пример</em> Лондонского Сити.","t_text":"The best <em>example</em> is the City of London.","ref":"MULTIUN.EN-RU_779579","cname":"MULTIUN.EN-RU","url":"http://opus.nlpl.eu/MultiUN.php","ctags":"general","pba":false},{"s_text":"Разработка Стратегических рамок для Бурунди являет собой замечательный <em>пример</em>.","t_text":"The development of a Strategic Framework for Burundi was one notable <em>example</em>.","ref":"MULTIUN.EN-RU_567076","cname":"MULTIUN.EN-RU","url":"http://opus.nlpl.eu/MultiUN.php","ctags":"general","pba":false},{"s_text":"Наиболее показательный <em>пример</em> - прекращение ретрансляции российских телепрограмм.","t_text":"The most obvious <em>example</em> is the decision to stop relaying Russian television programmes.","ref":"MULTIUN-V1.EN-RU_1121381","cname":"MULTIUN-V1.EN-RU","url":"https://conferences.unite.un.org/UNCorpus","ctags":"general","pba":false},{"s_text":"И говори тише, ты подаёшь дурной <em>пример</em>.","t_text":"And keep your voice down, you're setting a bad <em>example</em>.","ref":"OPENSUBTITLES-2016.EN-RU_10734967","cname":"OPENSUBTITLES-2016.EN-RU","url":"http://opus.nlpl.eu/OpenSubtitles2016.php","ctags":"general","pba":false},{"s_text":"Это лучший <em>пример</em>, иллюстрирующий жизненность и самодостаточность современной поэзии.","t_text":"This is the best <em>example</em> which illustrates modernity and self-sufficiency of modern poetry.","ref":"OPENSUBTITLES-2016.EN-RU_10960861","cname":"OPENSUBTITLES-2016.EN-RU","url":"http://opus.nlpl.eu/OpenSubtitles2016.php","ctags":"general","pba":false},{"s_text":"Мы будем вынуждены показывать плохой <em>пример</em>.","t_text":"Well, we'll have to set a poor <em>example</em>.","ref":"OPENSUBTITLES-2016.EN-RU_9031761","cname":"OPENSUBTITLES-2016.EN-RU","url":"http://opus.nlpl.eu/OpenSubtitles2016.php","ctags":"general","pba":false},{"s_text":"Вот типичный <em>пример</em> того, как можно извратить любое решение.","t_text":"This is a typical <em>example</em> of how a decision can be distorted.","ref":"MULTIUN-V1.EN-RU_889850","cname":"MULTIUN-V1.EN-RU","url":"https://conferences.unite.un.org/UNCorpus","ctags":"general","pba":false}],"nrows":10908,"nrows_exact":10908,"pagesize":20,"npages":546,"page":1,"removed_superstrings":["один пример","другой пример","наглядный пример"],"dictionary_entry_list":[{"frequency":6588,"term":"example","isFromDict":true,"isPrecomputed":false,"stags":[],"pos":"n.","sourcepos":["n."],"variant":null,"domain":null,"definition":null,"vowels2":null,"transliteration2":null,"alignFreq":6588,"reverseValidated":false,"pos_group":1,"isTranslation":true,"isFromLOCD":false,"inflectedForms":[]},{"frequency":416,"term":"case","isFromDict":true,"isPrecomputed":false,"stags":[],"pos":"n.","sourcepos":["n."],"variant":null,"domain":null,"definition":null,"vowels2":null,"transliteration2":null,"alignFreq":416,"reverseValidated":false,"pos_group":1,"isTranslation":true,"isFromLOCD":false,"inflectedForms":[]},{"frequency":225,"term":"illustration","isFromDict":true,"isPrecomputed":false,"stags":[],"pos":"n.","sourcepos":["n."],"variant":null,"domain":null,"definition":"That which illustrates","vowels2":null,"transliteration2":null,"alignFreq":225,"reverseValidated":false,"pos_group":1,"isTranslation":true,"isFromLOCD":false,"inflectedForms":[]},{"frequency":72,"term":"instance","isFromDict":true,"isPrecomputed":false,"stags":[],"pos":"n.","sourcepos":["n."],"variant":null,"domain":null,"definition":"example","vowels2":null,"transliteration2":"ˈɪnstəns","alignFreq":72,"reverseValidated":false,"pos_group":1,"isTranslation":true,"isFromLOCD":false,"inflectedForms":[]},{"frequency":65,"term":"lead","isFromDict":true,"isPrecomputed":false,"stags":[],"pos":"n.","sourcepos":["n."],"variant":null,"domain":null,"definition":null,"vowels2":null,"transliteration2":null,"alignFreq":65,"reverseValidated":false,"pos_group":1,"isTranslation":true,"isFromLOCD":false,"inflectedForms":[]},{"frequency":57,"term":"sample","isFromDict":true,"isPrecomputed":true,"stags":["precomputed"],"pos":"n.","sourcepos":["n."],"variant":null,"domain":null,"definition":null,"vowels2":null,"transliteration2":null,"alignFreq":57,"reverseValidated":true,"pos_group":1,"isTranslation":true,"isFromLOCD":false,"inflectedForms":[]},{"frequency":36,"term":"role model","isFromDict":true,"isPrecomputed":false,"stags":[],"pos":"n.","sourcepos":["n."],"variant":null,"domain":null,"definition":null,"vowels2":null,"transliteration2":null,"alignFreq":36,"reverseValidated":false,"pos_group":1,"isTranslation":true,"isFromLOCD":false,"inflectedForms":[]},{"frequency":6,"term":"piece","isFromDict":true,"isPrecomputed":false,"stags":[],"pos":"n.","sourcepos":["n."],"variant":null,"domain":null,"definition":null,"vowels2":null,"transliteration2":null,"alignFreq":6,"reverseValidated":false,"pos_group":1,"isTranslation":true,"isFromLOCD":false,"inflectedForms":[]},{"frequency":4,"term":"paradigm","isFromDict":true,"isPrecomputed":false,"stags":[],"pos":"n.","sourcepos":["n."],"variant":null,"domain":null,"definition":"Example serving as a model or pattern","vowels2":null,"transliteration2":null,"alignFreq":4,"reverseValidated":false,"pos_group":1,"isTranslation":true,"isFromLOCD":false,"inflectedForms":[]},{"frequency":3,"term":"exercise","isFromDict":true,"isPrecomputed":false,"stags":[],"pos":"n.","sourcepos":["n."],"variant":null,"domain":null,"definition":null,"vowels2":null,"transliteration2":null,"alignFreq":3,"reverseValidated":false,"pos_group":1,"isTranslation":true,"isFromLOCD":false,"inflectedForms":[]},{"frequency":0,"term":"illustrative problem","isFromDict":true,"isPrecomputed":false,"stags":[],"pos":"n.","sourcepos":["n."],"variant":null,"domain":null,"definition":null,"vowels2":null,"transliteration2":null,"alignFreq":0,"reverseValidated":false,"pos_group":1,"isTranslation":true,"isFromLOCD":false,"inflectedForms":[]},{"frequency":0,"term":"paradigma","isFromDict":true,"isPrecomputed":false,"stags":[],"pos":"n.","sourcepos":["n."],"variant":null,"domain":null,"definition":"Example serving as a model or pattern","vowels2":null,"transliteration2":null,"alignFreq":0,"reverseValidated":false,"pos_group":1,"isTranslation":true,"isFromLOCD":false,"inflectedForms":[]},{"frequency":0,"term":"peice","isFromDict":true,"isPrecomputed":false,"stags":[],"pos":null,"sourcepos":["n."],"variant":null,"domain":null,"definition":null,"vowels2":null,"transliteration2":null,"alignFreq":0,"reverseValidated":false,"pos_group":6,"isTranslation":true,"isFromLOCD":false,"inflectedForms":[]},{"frequency":53,"term":"one","isFromDict":true,"isPrecomputed":true,"stags":["precomputed"],"pos":null,"sourcepos":[],"variant":null,"domain":null,"definition":null,"vowels2":null,"transliteration2":null,"alignFreq":53,"reverseValidated":false,"pos_group":10,"isTranslation":false,"isFromLOCD":false,"inflectedForms":[]},{"frequency":30,"term":"way","isFromDict":true,"isPrecomputed":true,"stags":["precomputed"],"pos":null,"sourcepos":[],"variant":null,"domain":null,"definition":null,"vowels2":null,"transliteration2":null,"alignFreq":30,"reverseValidated":false,"pos_group":10,"isTranslation":false,"isFromLOCD":false,"inflectedForms":[]}],"dictionary_other_frequency":0,"dictionary_nrows":0,"time_ms":46,"request":{"source_text":"пример","target_text":"","source_lang":"ru","target_lang":"en","npage":1,"corpus":null,"nrows":20,"adapted":false,"nonadapted_text":"пример","rude_words":false,"colloquialisms":false,"risky_words":false,"mode":0,"expr_sug":0,"dym_apply":false,"pos_reorder":8,"device":0,"split_long":false,"has_locd":true,"avoidLOCD":false,"source_pos":null,"toolwordRequest":false},"suggestions":[{"lang":"ru","suggestion":"один <b>пример</b>","weight":699,"isFromDict":true},{"lang":"ru","suggestion":"<b>пример</b> того","weight":646,"isFromDict":false},{"lang":"ru","suggestion":"хороший <b>пример</b>","weight":342,"isFromDict":false},{"lang":"ru","suggestion":"собой <b>пример</b>","weight":337,"isFromDict":false},{"lang":"ru","suggestion":"другой <b>пример</b>","weight":222,"isFromDict":true},{"lang":"ru","suggestion":"яркий <b>пример</b>","weight":203,"isFromDict":false},{"lang":"ru","suggestion":"наглядный <b>пример</b>","weight":181,"isFromDict":true},{"lang":"ru","suggestion":"в <b>пример</b>","weight":161,"isFromDict":true},{"lang":"ru","suggestion":"конкретный <b>пример</b>","weight":151,"isFromDict":true}],"dym_case":-1,"dym_list":[],"dym_applied":null,"dym_nonadapted_search":null,"dym_pair_applied":null,"dym_nonadapted_search_pair":null,"dym_pair":null,"extracted_phrases":[]}
EOD;

    public function testOriginal(): void
    {
        $this->assertEquals(
            'пример',
            (
            new Context(
                json_decode(
                    $this->ruToEngTranslateWordPrimerResponse,
                    true
                )
            )
            )->original()
        );
    }

    public function testFirstInDictionary(): void
    {
        $this->assertEquals(
            'example',
            (
                new Context(
                    json_decode(
                        $this->ruToEngTranslateWordPrimerResponse,
                        true
                    )
                )
            )->firstInDictionary()
        );
    }

    public function testDictionary(): void
    {
        $this->assertContains(
            'sample',
            (
            new Context(
                json_decode(
                    $this->ruToEngTranslateWordPrimerResponse,
                    true
                )
            )
            )->dictionary()
        );
    }

    public function testExamples(): void
    {
        $this->assertEquals(
            [
                'source' => 'Красивый <em>пример</em> - прошлогодняя эпидемия свиного гриппа.',
                'target' => 'So a nice <em>example</em> of this came from last year and swine flu.'
            ],
            (
            new Context(
                json_decode(
                    $this->ruToEngTranslateWordPrimerResponse,
                    true
                )
            )
            )->examples()[0]
        );
    }

    public function testContextFromTranslation(): void
    {
        $mock = new MockHandler(
            [
                new Response(
                    200,
                    [],
                    $this->ruToEngTranslateWordPrimerResponse
                )
            ]
        );
        $handlerStack = HandlerStack::create($mock);
        $sut = Context::fromTranslation(
            new Client(['handler' => $handlerStack]),
            new Translation(
                new Language("en"),
                new Language('ru'),
                new Word("test")
            )
        );
        $this->assertEquals(
            "example",
            $sut->firstInDictionary()
        );
    }
}
