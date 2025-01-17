PGDMP                          |            estacionamiento    14.8    14.8     �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            �           1262    16394    estacionamiento    DATABASE     k   CREATE DATABASE estacionamiento WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'Spanish_Spain.1252';
    DROP DATABASE estacionamiento;
                postgres    false            �            1259    16396    precios    TABLE     [   CREATE TABLE public.precios (
    moto integer,
    auto integer,
    camioneta integer
);
    DROP TABLE public.precios;
       public         heap    postgres    false            �            1259    16405    reserva    TABLE     �   CREATE TABLE public.reserva (
    id integer NOT NULL,
    patente character varying(7) NOT NULL,
    "tipo-vehiculo" smallint NOT NULL,
    "hora-inicio" date NOT NULL,
    lugar smallint NOT NULL,
    "hora-fin" date,
    "precio-final" integer
);
    DROP TABLE public.reserva;
       public         heap    postgres    false            �            1259    16404    reserva_id_seq    SEQUENCE     �   CREATE SEQUENCE public.reserva_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.reserva_id_seq;
       public          postgres    false    211            �           0    0    reserva_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.reserva_id_seq OWNED BY public.reserva.id;
          public          postgres    false    210            `           2604    16408 
   reserva id    DEFAULT     h   ALTER TABLE ONLY public.reserva ALTER COLUMN id SET DEFAULT nextval('public.reserva_id_seq'::regclass);
 9   ALTER TABLE public.reserva ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    211    210    211            �          0    16396    precios 
   TABLE DATA           8   COPY public.precios (moto, auto, camioneta) FROM stdin;
    public          postgres    false    209   �       �          0    16405    reserva 
   TABLE DATA           q   COPY public.reserva (id, patente, "tipo-vehiculo", "hora-inicio", lugar, "hora-fin", "precio-final") FROM stdin;
    public          postgres    false    211          �           0    0    reserva_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.reserva_id_seq', 1, false);
          public          postgres    false    210            b           2606    16410    reserva reserva_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.reserva
    ADD CONSTRAINT reserva_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.reserva DROP CONSTRAINT reserva_pkey;
       public            postgres    false    211            �      x�350�4bC�=... ��      �      x������ � �     