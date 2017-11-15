                        <!-- @foreach($categories->where('group', 'product') as $category)
                            @if(count($category) > 0)
                                <h1>{{ $category->name }}</h1>
                                <hr>

                                @if(count($category->children) > 0)
                                    @foreach($category->children as $category2)
                                        <h2>{{ $category2->name}}</h2>
                                        <h2>{{ $category2->id}}</h2>
                                        <hr>

                                        @if(count($category2->children) > 0)
                                            @foreach($category2->children as $category3)
                                                <h3>{{ $category3->name}}</h3>
                                                <h3>{{ $category3->id}}</h3>
                                                <hr>
                                            @endforeach
                                        @endif

                                    @endforeach
                                @endif
                                {{-- $category->name --}}
                            @endif
                        @endforeach -->