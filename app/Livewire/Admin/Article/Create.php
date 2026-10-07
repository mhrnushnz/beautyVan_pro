<?php
namespace App\Livewire\Admin\Article;
use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use App\Services\SeoAnalyzer;//سرویس بررسی امتیاز سئو
class Create extends Component{
    use WithFileUploads;
    //تو پنل هستن
    public $title;
    public $slug;
    public $meta_description;
    public $article_category ;
    public $article_categories = [];
    public $description;
    public $image;
    public $removeImage = false;
    public $articleId;
    public $status = 'draft';
    public $editImage;
    public $article;
    public $focus_keyword;
    public $secondary_keywords_text = '';
    public $secondary_keywords = [];
    public $robots = 'index, follow';
    public array $seoAnalysis = [];
    public $schema = '';


    //مقدار ادیتور اینجا تو پراپرتی میشینه
    #[On('set-description')]
    public function setDescription($content){
        $this->description = $content;
        $this->analyzeSeo();
    }




    //$articleId این پارا متر رو از url صفحه ویرایش میگیره
    public function mount($articleId = null){
        $this->article_categories = ArticleCategory::all();      //all کالکشن از رکورد ها بر میگردونه برای همین تو یک پراپرتی ب صورت ارایه ذخیره میکنیم
        //مقدار دهی کردن برای ویرایش
        if ($articleId != null){
            $this->article = Article::where('id', $articleId)->first();
            $this->articleId = $this->article->id;
            $this->title = $this->article->title;
            $this->slug = $this->article->slug;
            $this->article_category = $this->article->article_category_id;
            $this->description = $this->article->content;
            $this->status = $this->article->status;
            $this->meta_description = $this->article->meta_description;
            $this->editImage = $this->article->path;     //path از نوع رشته است برای همین نمیتونیم از $this->image استفاده کنیم
            $this->focus_keyword = $this->article->focus_keyword;
            $this->secondary_keywords = $this->article->secondary_keywords ?? [];
            $this->secondary_keywords_text = '';
            $this->robots = $this->article->robots ?? 'index, follow';
            $this->schema = $this->article->schema ? json_encode(
                    $this->article->schema,
                    JSON_PRETTY_PRINT |
                    JSON_UNESCAPED_UNICODE |
                    JSON_UNESCAPED_SLASHES
                ) : '';
        }
        $this->analyzeSeo();
    }


    public function updatedTitle(){
        $this->slug = Str::slug($this->title, '-' , null);
    }


    public function submit(){
// فقط اعتبار سنجی
        $rules = [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'article_category' => 'required|exists:article_categories,id',
            'description' => 'required|string',
            'status' => 'required|in:published,draft',
            'meta_description' => 'string|max:200',
            'focus_keyword' => 'nullable|string|max:255',
            'secondary_keywords_text' => 'nullable|string|max:1000',
            'robots' => ['required', Rule::in(['index, follow', 'noindex, follow', 'noindex, nofollow'])],
            'schema' => ['nullable','json',//میتونه خالی باشه و باید جیسون باشه
                function ($attribute, $value, $fail) {
                    $schemaData = json_decode($value, true);
                    // بررسی @context
                    if (!isset($schemaData['@context'])) {
                        $fail('اسکیما باید دارای @context باشد.');
                        return;
                    }

                    // بررسی مقدار @context
                    if ($schemaData['@context'] !== 'https://schema.org') {
                        $fail('@context باید برابر https://schema.org باشد.');
                        return;
                    }

                    // باید حداقل @type یا @graph داشته باشیم
                    if (!isset($schemaData['@type']) && !isset($schemaData['@graph'])) {
                        $fail('اسکیما باید دارای @type یا @graph باشد.');
                        return;
                    }

                    // اگر @graph وجود دارد، باید آرایه باشد
                    if (isset($schemaData['@graph'])) {
                        if (!is_array($schemaData['@graph'])) {
                            $fail('@graph باید یک آرایه باشد.');
                            return;
                        }

                        // @graph نباید خالی باشد
                        if (empty($schemaData['@graph'])) {
                            $fail('@graph نباید خالی باشد.');
                            return;
                        }
                    }
                },
            ],
        ];



        // اگر در حالت create هستیم برا ولیدیشن تصویر:
        if (!$this->articleId) {
            $rules['image'] = 'required|image|mimes:jpg,jpeg,png,webp|max:2048';
        }
        // اگر در حالت edit هستیم و عکس حذف شده برای ولیدیشن تصویر:
        if ($this->articleId && $this->removeImage && !$this->image) {
            $rules['image'] = 'required|image|mimes:jpg,jpeg,png,webp|max:2048';
        }

        $validatedData = $this->validate($rules, [
            'schema.json' => 'اسکیما وارد شده معتبر نیست. لطفاً ساختار JSON را بررسی کنید.',
            '*.required' => 'پر کردن فیلد الزامی می باشد',
            '*.min' => ' حداقل یک تصویر وجود داشته باشد',
            'title.max' =>'حداکثر تعداد کاراکتر ها 255 است',
            'slug.max' =>'حداکثر تعداد کاراکتر ها 255 است',
            'meta_description.max' =>'حداکثر تعداد کاراکتر ها 200 است',
            'focus_keyword.max' =>'حداکثر تعداد کاراکتر ها 255 است',
            '*.string' =>'فرمت نامعتبر است',
        ]);

        $validatedData['secondary_keywords'] = $this->secondary_keywords;
        $validatedData['focus_keyword'] = $this->focus_keyword;
        $validatedData['robots'] = $this->robots;
        $validatedData['schema'] = !empty($this->schema) ? json_decode($this->schema, true): null;

        // safety check
        if ($this->articleId && $this->removeImage && !$this->image) {
            $this->addError('image', 'در صورت حذف تصویر باید تصویر جدید انتخاب شود');
            return;
        }

        $articleModel = new Article();
        $articleModel->submit($validatedData, $this->articleId, $this->image, $this->editImage);
        $this->reset(['title','slug','article_category','description','image','meta_description','focus_keyword','secondary_keywords_text','robots']);
        $this->removeImage = false;
        session()->flash('toast', ['type' => 'success', 'message' => 'با موفقیت ثبت شد']);
        return $this->redirect(route('article_admin'));
    }


    public function clear_temporary_image(){
        //اگر تصویر هنوز تو حافظه موقتی(storage)بود از این تابع استفاده میشه
        $this->image = null;
    }


    public function delete_poster($article_id){
        $article = Article::find($article_id);
        if (!$article) return;

        if ($article->path && Storage::disk('public')->exists($article->path)) {
            Storage::disk('public')->delete($article->path);
        }
        $this->editImage = null;
        $this->removeImage = true; // مهم
    }


    public function addSecondaryKeyword(){
        $keywords = $this->secondary_keywords_text;
        if ($keywords === ''){ //1)اگر خالی بود اضافه نکن
            return;
        }
        if (!in_array($keywords, $this->secondary_keywords) ){
            $this->secondary_keywords[] = $keywords; //2)اگر عبارت ورودی داخل این ارایه وجود نداشت اضافه کن
        }
        $this->secondary_keywords_text = ''; //3) خالی کردن input
        $this->analyzeSeo();
    }


    public function removeSecondaryKeyword($index){
        unset($this->secondary_keywords[$index]);
        $this->secondary_keywords = array_values($this->secondary_keywords);
        $this->analyzeSeo();
    }

    //محاسبه امتیاز سئو
    public function analyzeSeo(){
        $article = $this->articleId
            ? Article::find($this->articleId)
            : new Article();
        if (!$article) {
            return;
        }
        $article->title = $this->title;
        $article->slug = $this->slug;
        $article->content = $this->description;
        $article->meta_description = $this->meta_description;
        $article->focus_keyword = $this->focus_keyword;
        $article->secondary_keywords = $this->secondary_keywords;
        $this->seoAnalysis = SeoAnalyzer::analyze($article);

    }

    //اپدیت خورد کار امتیاز سئو
    public function updated($property){
        $seoFields = [
            'title',
            'slug',
            'meta_description',
            'focus_keyword',
            'secondary_keywords',
            'description',
        ];
        if (in_array($property, $seoFields)) {
            $this->analyzeSeo();
        }
    }


    public function render(){
        return view('livewire.admin.article.create')->layout('layouts.admin.app');
    }
}
