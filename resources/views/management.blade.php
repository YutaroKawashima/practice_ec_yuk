@extends('layouts.auth')

@section('title', '商品管理ページ')

@section('content')
    <div class="item-area">
        <h2> 商品管理 </h2>
        <div class="register-content">
            <a href="" class="modal_open" data-target="register">
                <button name="register_product" class="add-button modal_open">
                    ＋商品を登録
                </button>
            </a>
        </div>
    </div>
    <div id="register" class="modal">
        <div class="modal-background modal_close"></div>
        <div class="modal-content">
            <h3 class="modal-title-register"> New Product（商品の登録） </h3>
            <form id="register_form" method="post" action="{{ route('management') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="register-form">
                    <p class="product-name-area">
                        <label for="name">
                            Name（商品名）
                        </label>
                        <p>
                            <input type="text" name="name" placeholder="20文字以内" class="name-form" value="" required>
                        </p>
                    </p>
                    <p class="product-price-area">
                        <label for="price">
                            Price（価格）
                        </label>
                        <p>
                            <input type="text" name="price" placeholder="1〜100万まで" class="price-form" value="" required>
                        </p>
                    </p>
                    <p class="product-stock-area">
                        <label for="stock">
                            Stock（在庫数）
                        </label>
                        <p>
                            <input type="text" name="stock" placeholder="1〜1万まで" class="stock-form" value="" required>
                        </p>
                    </p>
                    <p class="product-image-area">
                        <label for="image">
                            Image（商品画像）
                        </label>
                        <p>
                            <input type="file" name="image" class="image-form">
                        </p>
                    </p>
                    <p class="product-status-area">
                        <label for="status">
                            Status（公開ステータス）
                        </label>
                        <p>
                            <input type="radio" name="status" value="1" class="status-form" required>公開
                            <input type="radio" name="status" value="0" class="status-form" required>非公開
                        </p>
                    </p>
                </div>
            </form>
            <div class="modal-button-area">
                <button id="confirm" type="submit" name="confirm" class="form-button">
                    登録
                </button>
                <button id="cancel" name="cancel" class="form-button modal_close">
                    キャンセル
                </button>
            </div>
        </div>
    </div>
    <div class="item-area">
        <h3> 商品一覧 </h3>
        <table>
            <tr>
                <th class="id">
                    商品ID
                </th>
                <th class="image">
                    商品画像
                </th>
                <th>
                    商品名
                </th>
                <th>
                    価格
                </th>
                <th>
                    在庫数
                </th>
                <th>
                    公開状態
                </th>
                <th>
                    操作
                </th>
            </tr>
            @forelse($product as $item)
                <tr>
                    <td class="id">
                        {{ $item->id }}
                    </td>
                    <td class="image">
                        <img class="product-image" src="{{ asset('./storage/photos/'.$item->image) }}" alt="商品画像">
                    </td>
                    <td class="name">
                            {{ $item->name }}
                    </td>
                    <td class="price">
                        {{ $item->price }}
                    </td>
                    <td class="stock">
                        {{ $item->stock->stock }}
                        <a href="" class="modal_open" data-target="edit">
                            <img class="edit-image" src="{{ asset('./storage/image/edit.png') }}" alt="編集">
                        </a>
                        <div id="edit" class="modal edit-modal">
                            <div class="modal-content">
                                <form method="post" action="{{ route('management') }}">

                                </form>
                            </div>
                        </div>
                    </td>
                    <td class="status">
                        <form method="post" action="{{ url('/management/status') }}" class="toggle-area">
                            {{ csrf_field() }}
                            <div class="status-area">
                                @if($item->status === 1)
                                    <button id="public" type="submit" name="change_status" value="0"> 公開 </button>
                                    <input type="hidden" name="product_id" value ="{{ $item->id }}">
                                @elseif($item->status === 0)
                                    <button id="private" type="submit" name="change_status" value="1"> 非公開 </button>
                                    <input type="hidden" name="product_id" value ="{{ $item->id }}">
                                @endif
                            </div>
                        </form>
                    </td>
                    <td class="delete">
                        <a href="" data-target="delete">
                            <img class="delete-image" src="{{ asset('./storage/image/trash.png') }}" alt="削除">
                        </a>
                    </td>
                </tr>
            @empty
                <p> 商品がありません </p>
            @endforelse
        </table>
    </div>


@endsection
